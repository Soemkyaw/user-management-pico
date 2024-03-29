<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // direct to login page
    public function loginPage()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($loginData)) {
            return redirect('/');
        }else{
            return redirect()->back()->withErrors(['login' => 'Invalid email or password.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.page');
    }
}
