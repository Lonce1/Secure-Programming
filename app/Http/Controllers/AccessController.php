<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Con;

class AccessController extends Con
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    
    public function homeIndex()
    {
        return view('home');
    }
    
    public function serviceIndex()
    {
        return view('service');
    }
}
