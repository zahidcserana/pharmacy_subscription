<?php

namespace App\Http\Controllers;

use App\SmartPharmacy;
use Illuminate\Http\Request;

class SmartPharmacyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $pharmacies = SmartPharmacy::all();
        return view('spe_list', compact('pharmacies'));
    }

    public function addNewPharmacy(Request $request)
    {
        $sp = SmartPharmacy::where('name', $request->name)->get();
        if(sizeof($sp)){
            return redirect('spe-list')->with('message', 'Pharmacy already exist!');
        }

        $this->validate($request, [
            'name' => 'required|unique:smart_pharmacies',
            'license_no' => 'required',
            'owner_name' => 'required',
            'pharmacy_code' => 'required',
            'start_date' => 'required',
        ]);

        $addSmartPharmacy = new SmartPharmacy();
        $addSmartPharmacy->pharmacy_code = $request->pharmacy_code;
        $addSmartPharmacy->name = $request->name;
        $addSmartPharmacy->address = $request->address;
        $addSmartPharmacy->location = $request->location;
        $addSmartPharmacy->owner_name = $request->owner_name;
        $addSmartPharmacy->license_no = $request->license_no;
        $addSmartPharmacy->model_pharmacy_no = $request->model_pharmacy_no;
        $addSmartPharmacy->contact_person = $request->contact_person;
        $addSmartPharmacy->mobile_no = $request->mobile_no;
        $addSmartPharmacy->start_date = $request->start_date;
        $addSmartPharmacy->save();

        return redirect('spe-list')->with('message', 'Pharmacy added Successful!');
    }

}
