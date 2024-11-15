<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    public function viewUpdate()
    {
        $user = Auth::user();
        if ($user === NULL){
            return redirect()->route('login');
        }
        return view('updateprofile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->name = $request->username;
        $user->email = $request->email;

        return redirect()->route('updateprofile')->with('success', 'Profile updated successfully.');
    }
}
