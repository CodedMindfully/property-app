<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;

class AuthController extends Controller
{   
    //Checks if the admin is logged in 
    public function showLogin(){
        //Look at the user's browser cookie
        // If an admin is already logged in, redirect to dashboard
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
        //if not, show the login form
        return view('admin.auth.login');
    }

    // Handle login form submition 
    public function login(Request $request){
        // Validadate the form input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        // Attempt login with admin guard
        if(Auth::guard('admin')->attempt($credentials)){
            $request->session()->regenerate();//prevent session fixation
            return redirect()->route('admin.dashboard');
        }

        // Return error if login failed 
        return back()->withErrors([
            'email' => 'These credentials do not match our records.'
        ]);
    }

    // Handle logout
    public function logout(Request $request){
        Auth::guard('admin')->logout();//logout current admin
        $request->session()->invalidate();//delete all forms of current session
        $request->session()->regenerateToken();//Create a brand new CSRF token so the old one can't be used
        return redirect()->route('admin.login');
    }

}
