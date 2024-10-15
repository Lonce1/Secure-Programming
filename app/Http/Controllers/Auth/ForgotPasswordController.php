<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    // Show the "Forgot Password" form
    public function showLinkRequestForm()
    {
        return view('forgotpassword');
    }

    // Handle sending the password reset email
    public function sendResetLinkEmail(Request $request)
    {
        // Validate the email field
        $request->validate(['email' => 'required|email']);

        // Send the password reset link
        $status = Password::sendResetLink($request->only('email'));

        // Redirect with a status message
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
