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
        return view('auth.register');  
    }

    // Handle the registration submission
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6',
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->name = $request->username;
        $user->password = Hash::make($request->password);
        if ($user->save()){
            return redirect(route("login"))->with('success', 'Registration successful!');
        }
        return redirect("register")->with('error', 'Failed Registration!');;
    }
}
