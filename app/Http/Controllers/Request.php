<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'password' => 'required|string|min:8',
    ]);

    // Store the validated data
    User::create($validatedData);

    return redirect()->back()->with('success', 'User created successfully!');
}
