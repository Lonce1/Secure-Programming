<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('updateprofile', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'username' => 'required|string|max:255',
            'phone_number' => [
                'required',
                'string',
                'regex:/^8[0-9]{10}$/', // Ensures the number starts with 8 and is 11 digits long
                'size:11'
            
            ],
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the profile image
        ]);

        $user = Auth::user();
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->phone_number = '+62' . $request->input('phone_number');
        // if ($request->hasFile('profile_image')) {
        //     if ($user->profile_image) {
        //         Storage::delete($user->profile_image);
        //     }
        //     $path = $request->file('profile_image')->store('profile_images');
        //     $user->profile_image = $path;
        // }
        if ($request->hasFile('profile_picture')) {
            $profileImage = $request->file('profile_picture');
            $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('images/profile'), $imageName);
            // Optionally delete old profile picture if exists
            if ($user->profile_picture) {
                unlink(public_path('images/profile/' . $user->profile_picture));
            }

            $user->profile_picture = $imageName;
        }
        $user->save();

        return redirect('/home')->with('success', 'Profile updated successfully!');
    }
}