<?php

namespace App\Http\Controllers;

use App\User;
use App\Coupon;
use App\MonthlyBill;
use App\SmartPharmacy;
use Illuminate\Http\Request;

class MonthlyBillController extends Controller
{
    public function monthlyBill()
    {
        $users = User::all();
        $pharmacies = SmartPharmacy::all();
        $monthly_bills = MonthlyBill::select('monthly_bills.id', 'smart_pharmacies.name as pharmacy_name', 'users.name as user_name', 'monthly_bills.pay_date', 'monthly_bills.payment_for', 'monthly_bills.payment_type', 'monthly_bills.month', 'monthly_bills.payment_by', 'monthly_bills.amount', 'monthly_bills.remarks')
        ->leftjoin('smart_pharmacies', 'smart_pharmacies.id', '=', 'monthly_bills.pharmacy_id')
        ->leftjoin('users', 'users.id', '=', 'monthly_bills.collected_by')
        ->get();
        return view('monthly_bill', compact('users', 'pharmacies', 'monthly_bills'));
    }

    public function addNewMonthlyBill(Request $request)
    {
        $this->validate($request, [
            'pharmacy_id' => 'required',
            'pay_date' => 'required',
            'payment_for' => 'required',
            'month' => 'required',
            'payment_by' => 'required',
            'collected_by' => 'required',
            'amount' => 'required',
        ]);
        $pay_date = date('Y-m-d', strtotime("1970-01-01"));
        if($request->pay_date){
            $date = str_replace('/', '-', $request->pay_date);
            $pay_date = date('Y-m-d', strtotime($date));
        }

        $addMonthlyBill = new MonthlyBill();
        $addMonthlyBill->pharmacy_id = $request->pharmacy_id;
        $addMonthlyBill->pay_date = $pay_date;
        $addMonthlyBill->payment_for = $request->payment_for;
        $addMonthlyBill->payment_type = $request->payment_type;
        $addMonthlyBill->month = $request->month;
        $addMonthlyBill->payment_by = $request->payment_by;
        $addMonthlyBill->collected_by = $request->collected_by;
        $addMonthlyBill->amount = $request->amount;
        $addMonthlyBill->remarks = $request->remarks;
        $addMonthlyBill->save();

        return redirect('monthly-bill')->with('message', 'Monthly Bill added Successful!');
    }

    public function store(Request $request)
    {}

    public function show(MonthlyBill $monthlyBill)
    {}

    public function edit(MonthlyBill $monthlyBill)
    {}

    public function update(Request $request, MonthlyBill $monthlyBill)
    {}

    public function destroy(MonthlyBill $monthlyBill)
    {}
}
