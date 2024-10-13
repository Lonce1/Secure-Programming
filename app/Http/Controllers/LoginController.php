<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function viewLoginForm()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Must insert email',
            'password.required' => 'Must insert password',
        ]);

        $infologin =[
            'email' => $request->email,
            'password' => $request->password
        ];
    
        if(Auth::attempt($infologin)) {
            return view("home"); // sesuaikan
        }
        else
        {
            return view("register"); // sesuaikan
        }
    }
}