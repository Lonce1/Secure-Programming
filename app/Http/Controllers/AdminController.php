<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function adminIndex()
    {
        // Return the admin view directly
        return view('admin'); // Ensure this corresponds to resources/views/admin.blade.php
    }
}