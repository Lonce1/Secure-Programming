<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function viewLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('home');
        }
    
        return back()->withErrors([
            'email' => 'Invalid Email or Password',
        ]);
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}