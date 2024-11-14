<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    public function viewUpdate()
    {
        $user = Auth::user(); // Retrieve the authenticated user
        if ($user === NULL){
            return redirect()->route('login');
        }
        return view('updateprofile', compact('user')); // Pass 'user' to the view
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'profileimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $request->username;
        $user->email = $request->email;

        // Handle profile image upload
        if ($request->hasFile('profileimage')) {
            // Delete old image if exists
            if ($user->profile_image && Storage::exists('public/' . $user->profile_image)) {
                Storage::delete('public/' . $user->profile_image);
            }

            // Store the new image and update the profile image path
            $path = $request->file('profileimage')->store('profile_images', 'public');
            $user->profile_image = $path;
        }

        $user->save(); // Save the updated user information

        // Redirect back with a success message
        return redirect()->route('updateprofile')->with('success', 'Profile updated successfully.');
    }
}
