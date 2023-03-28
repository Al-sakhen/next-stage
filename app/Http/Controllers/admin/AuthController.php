<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('admin.auth.loginForm');
    }

    public function checkLogin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Logged in successfully');
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }


}
