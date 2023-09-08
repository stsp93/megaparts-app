<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function showLogin()
    {
        return view('user.login');
    }

    public function login()
    {
        $credentials = request()->only('email', 'password');

        if (auth()->attempt($credentials)) {
            // Authentication was successful
            if(auth()->user()->role === 'admin'){
                return redirect()->intended('/private/admin');
            }
            return redirect()->intended('/'); // Redirect to a protected page
        }

        // Authentication failed
        return redirect('/login')->with('error', 'Грешни имейл или парола');
    }

    public function showRegister() {
        return view('user.register');
    }

    public function register()
    {
        $formData = request()->validate([
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => ['required', 'min:3'],
            'password_confirmed' => ['confirmed'],
        ]);

        $formData['password'] = bcrypt($formData['password']);

        $user = User::create($formData);
        
        // Login after register
        auth()->login($user);
        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();
        // Clear session and generate new token
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    }

    public function showManagerPanel()
    {

        return view('user.manager',['products' => Product::latest()->simplePaginate(5)]);
    }


}
