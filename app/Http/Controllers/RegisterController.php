<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Show the registration form
    public function showRegistrationForm()
    {
        return view('register');  
    }

    // Handle the registration submission
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
        ],[
            'email.required' => 'Must insert email',
            'username.required' => 'Must insert username',
            'password.required' => 'Must insert password',
        ]);

        // $data = [
        //     'email' => $request->email,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password)
        // ]

        // $data = User::create($data)

        $user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
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
            return redirect("register"); // sesuaikan
        }
    }
}
