<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showLogin() {
       return view('user.login');
    }

    public function login() {
        $credentials = request()->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication was successful
            return redirect()->intended('/'); // Redirect to a protected page
        }
    
        // Authentication failed
        return redirect()->back()->with('error', 'Invalid credentials');
     }
}
