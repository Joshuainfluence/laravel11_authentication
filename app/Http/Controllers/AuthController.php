<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //show the login form
    public function showLoginForm() {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    // handle the login logic
    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // authentication passed
            return  redirect()->route('dashboard');
        }else{
            return redirect()->route('login')->withErrors('Invalid credentials');
        }
    }

    // show the signup form
    public function showSignupForm(){
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('signup');
    }

    // handle the signup logic
    public function signup(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // create a new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // automatically log the user in
        Auth::attempt($request->only('email', 'password'));
        return redirect()->route('dashboard');
    }
}
