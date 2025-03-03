<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;


class UserController extends Controller
{
    public function login()
    {
        return view('welcome');
    }


    public function loginPost(Request $request)
    {
        // dd($request->all());
        $credentials = $request->only('phone', 'password');
        $credentials['password'] = $request->password;
        // dd($credentials);
        if (Auth::guard('web')->attempt($credentials)) {
            // dd('hi');
            $notification1 = array(
                'message' => 'User Login Successful',
                'alert-type' => 'success'
            );
            return redirect()->route('user-dashboard')->with($notification1);
        } else {
            $notification2 = array(
                'message' => 'Invalid Credentials',
                'alert-type' => 'error'
            );
            return back()->with($notification2);
        }
    }

    public function userDashboard()
    {
        return view('dashboard');
    }
}
