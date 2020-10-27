<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Coupon;
use App\SmartPharmacy;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::select('coupons.coupon_code', 'coupons.apply_date', 'coupons.coupon_type', 'coupons.status', 'users.name as generated_by', 'smart_pharmacies.name as pharmacy_name', 'coupons.activated_by')
            ->leftjoin('smart_pharmacies', 'smart_pharmacies.id', '=', 'coupons.pharmacy_id')
            ->leftjoin('users', 'users.id', '=', 'coupons.generated_by')
            ->orderBy('coupons.id', 'DESC')
            ->get();
        return view('coupon', compact('coupons'));
    }

    public function generate_coupon(Request $request)
    {
        $this->subscriptionCoupon($request);
        return redirect('coupon')->with('message', 'Coupon Generated Successful!');
    }

    public function subscriptionCoupon($request)
    {

        $number_of_generated_coupon = $request->number_of_generated_coupon;
        $coupon = [];
        for ($i = 1; $i <= $number_of_generated_coupon; $i++) {
            $coupon[] = $this->_randomString(16);
        }
        foreach ($coupon as $key => $value) {
            $addNewCoupon = new Coupon();
            $addNewCoupon->coupon_code = $value;
            $addNewCoupon->coupon_type = $request->coupon_type;
            $addNewCoupon->generated_by = Auth::user()->id;
            $addNewCoupon->save();
        }
        return true;
    }

    public function _randomString($length = 6)
    {
        $str = "";
        $characters = array_merge(range('A', 'Z'), range('0', '9'));
        $max = count($characters) - 1;

        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

    public function applySubscription()
    {
        $status = false;
        $msg = '';
        $subscription_period = 0;

        $data = json_decode(file_get_contents('php://input'), true);

        //dd($data);

        $coupon = Coupon::where('coupon_type', $data['coupon_type'])
            ->where('coupon_code', $data['coupon_code'])
            ->first();
        
        $pharmacy_code = $data['pharmacy_branch_id'] ? $data['pharmacy_branch_id'] : 0;

        if ($coupon) {
            if ($coupon->status == 'USED') {
                $msg = 'Already used this coupon.';
            } else if($coupon->status == 'INACTIVE') { 
                $msg = 'Invalid coupon.';
            }else {

                $smartPharmacy = SmartPharmacy::where('pharmacy_code', $pharmacy_code)->first();
                $UpdateSmartPharmacy = SmartPharmacy::find($smartPharmacy->id);

                if ($UpdateSmartPharmacy) 
                {
                    $status = true;

                    $UpdateCoupon = Coupon::find($coupon->id);
                    $UpdateCoupon->status = 'USED';
                    $UpdateCoupon->apply_date = date('Y-m-d H:i:s');
                    $UpdateCoupon->pharmacy_id = $smartPharmacy->id;
                    $UpdateCoupon->pharmacy_branch_id = $pharmacy_code;
                    $UpdateCoupon->save();

                    if ($coupon->coupon_type == '1MONTH') {
                        $UpdateSmartPharmacy->validity = $UpdateSmartPharmacy->validity + 30;
                    } else if ($coupon->coupon_type == '3MONTH') {
                        $UpdateSmartPharmacy->validity = $UpdateSmartPharmacy->validity + 30 * 3;
                    } else if ($coupon->coupon_type == '6MONTH') {
                        $UpdateSmartPharmacy->validity = $UpdateSmartPharmacy->validity + 30 * 6;
                    } else if ($coupon->coupon_type == '1YEAR') {
                        $UpdateSmartPharmacy->validity = $UpdateSmartPharmacy->validity + 360;
                    }
                    $UpdateSmartPharmacy->use_count = $data['subscription_count'];
                    $UpdateSmartPharmacy->save();
                    $subscription_period = $UpdateSmartPharmacy->validity;
                }
                else{
                    $status = false;
                    $msg = 'Invalid coupon.';
                }
            }
        } else {
            $msg = 'Invalid coupon.';
        }
        return response()->json(['status' => $status, 'message' => $msg, 'data' => ['subscription_period' => $subscription_period]]);
    }
}
