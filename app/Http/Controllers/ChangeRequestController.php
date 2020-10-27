<?php

namespace App\Http\Controllers;

use App\User;
use App\changeRequest;
use App\SmartPharmacy;
use Illuminate\Http\Request;

class ChangeRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        $pharmacies = SmartPharmacy::all();
        $crLists = changeRequest::select('change_requests.feature', 'change_requests.details', 'change_requests.created_at', 'change_requests.payment_type', 'change_requests.status', 'smart_pharmacies.name as pharmacy_name', 'users.name as user_name')
        ->leftjoin('smart_pharmacies', 'smart_pharmacies.id', '=', 'change_requests.pharmacy_id')
        ->leftjoin('users', 'users.id', '=', 'change_requests.collected_by')
        ->get();
        return view('change_request', compact('users', 'pharmacies', 'crLists'));
    }

    public function addNewCR(Request $request)
    {
        $this->validate($request, [
            'pharmacy_id' => 'required',
            'feature' => 'required',
            'details' => 'required',
            'payment_type' => 'required',
            'collected_by' => 'required',
        ]);

        $addChangeRequest = new changeRequest();
        $addChangeRequest->pharmacy_id = $request->pharmacy_id;
        $addChangeRequest->feature = $request->feature;
        $addChangeRequest->details = $request->details;
        $addChangeRequest->payment_type = $request->payment_type;
        $addChangeRequest->collected_by = $request->collected_by;
        $addChangeRequest->save();

        return redirect('change-request')->with('message', 'Change Request added Successful!');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(changeRequest $changeRequest)
    {
        //
    }

    public function edit(changeRequest $changeRequest)
    {
        //
    }

    public function update(Request $request, changeRequest $changeRequest)
    {
        //
    }

    public function destroy(changeRequest $changeRequest)
    {
        //
    }
}
