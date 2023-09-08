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
        $credentials = request()->only('username', 'password');

        if (auth()->attempt($credentials)) {
            // Authentication was successful
            return redirect()->intended('/'); // Redirect to a protected page
        }

        // Authentication failed
        return redirect('/login')->with('error', 'Грешни потребител или парола');
    }

    public function showRegister() {
        return view('user.register');
    }

    public function register()
    {
        $formData = request()->validate([
            'username' => ['required', 'min:3', Rule::unique('users')],
            'password' => ['required', 'min:3'],
            'password_confirmed' => ['confirmed']
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

        return redirect('/');
    }

    public function showManagerPanel()
    {

        return view('user.manager',['products' => Product::latest()->simplePaginate(5)]);
    }


}
