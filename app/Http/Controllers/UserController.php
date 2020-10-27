<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addNewUser(Request $request)
    {
        $users = User::where('email', $request->email)->get();
        if(sizeof($users)){
            return redirect('user-list')->with('message', 'User already exist!');
        }

        $this->validate($request, [
            'name' => 'required',
            'email' => 'unique:users,email',
        ]);

        if($request->password != $request->password_confirmation){
            return redirect('user-list')->with('message', 'Passwords do not match!');
        }

        $password = $request->password ? $request->password : '12345678';

        $userModel = new User();
        $userModel->name = $request->name;
        $userModel->email = $request->email;
        $userModel->mobile = $request->mobile;
        $userModel->designation = $request->designation;
        $userModel->address = $request->address;
        $userModel->user_type = $request->user_type;
        $userModel->password = Hash::make($password);
        $userModel->save();

        $users = User::all();

        return redirect('user-list', compact('users'))->with('message', 'User added Successful!');
    }
}
