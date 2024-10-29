<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function viewLoginForm()
    {
        return view("auth.login");
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
        $credential = $request->only("email", "password");
        if(Auth::attempt($credential)){
            $user = Auth::user();
            if ($user->role === 'admin'){
                return redirect()-> intended(route("admin"));
            }
            return redirect()-> intended(route("home"));
        }
        return redirect(route("login"))->with("error", "Login failed!");
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('status', 'Logged out successfully');
    }
}