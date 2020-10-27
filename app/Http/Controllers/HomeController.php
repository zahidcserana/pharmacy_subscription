<?php

namespace App\Http\Controllers;

use App\User;
use App\SmartPharmacy;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pharmacies = SmartPharmacy::count();
        $users = User::count();
        return view('dashboard', compact('users', 'pharmacies'));
    }

    public function dashboard()
    {
        $active_pharmacies = SmartPharmacy::where('status', 'active')->count();
        $inactive_pharmacies = SmartPharmacy::where('status', 'inactive')->count();
        $removed_pharmacies = SmartPharmacy::where('status', 'removed')->count();
        $pharmacies = SmartPharmacy::count();
        $users = User::count();
        return view('dashboard', compact('users', 'pharmacies', 'active_pharmacies', 'inactive_pharmacies', 'removed_pharmacies'));
    }

    public function add_user_view(){
        $users = User::all();
        return view('add_user', compact('users'));
    }
}
