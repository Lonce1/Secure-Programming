<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function viewRegisterForm()
    {
        return view('register');
    }
}
