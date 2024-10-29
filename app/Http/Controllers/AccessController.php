<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Con;
use Illuminate\Support\Facades\Redirect;

class AccessController extends Con
{
    // Apply middleware to ensure only authenticated users can access this controller
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    // Method to show the home page
    public function homeIndex()
    {
        return view('home');
    }

    public function serviceIndex()
    {
        return view('service');
    }

    public function adminIndex()
    {
        return Redirect::to('http://secure-app.test/admin/auth/login');
    }
}
