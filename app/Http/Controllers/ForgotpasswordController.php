<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Models\User;

class ForgotpasswordController extends Controller
{
    function showforgotpassword(){
        return view("auth.forgotpassword");
    }

    function forgotpasswordPost(Request $request){
        $request->validate([
            'email' => "required|email|exists:users"
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email], // Condition to find the row (by email)
            ['token' => $token, 'created_at' => Carbon::now()] // Data to update or insert
        );

        Mail::send("email.forgotpassword", ['token' => $token], function($message) use ($request){
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        return redirect()->to(route("forgotpassword"))->with("success", "Please chek your email!");
    }

    function resetpassword($token){
        return view("newpassword", compact('token'));
    }

    function resetpasswordPost(Request $request){
        $request->validate([
            "email" => "required|email|exists:users",
            "password" => "required|string|min:6|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&#]/",
            "password_confirmation" => "required"
        ]);

        $updatePassword = DB::table('password_reset_tokens')->where([
            "email" =>$request->email,
            "token" => $request->token
        ])->first();

        if (!$updatePassword){
            return redirect()->to(route("reset.password"))->with("error", "Invalid");
        }

        User::where("email", $request->email)->update(["password" => Hash::make($request->password)]);

        DB::table("password_reset_tokens")->where(["email" => $request->email])->delete();

        return redirect()->to(route("login"))->with("success", "password reset success");
    }
}
