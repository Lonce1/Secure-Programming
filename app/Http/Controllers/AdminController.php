<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Controller as Con;

class AdminController extends Con
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {
        $items = User::all();
        return view('admin.dashboard', compact('items'));
    }

    public function create() {
        return view('admin.create');
    }

    public function store(Request $request) {
        $data = $request->only(['email', 'username', 'password', 'role']);

        // Hash the password before saving
        $data['password'] = bcrypt($data['password']);
    
        User::create($data);
        return redirect()->route('admin.dashboard')->with('success', 'Item created successfully');
    }

    public function edit($id) {
        $item = User::find($id);
        return view('admin.edit', compact('item'));
    }

    public function update(Request $request, $id) {
        $item = User::find($id);
        $item->update($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'Item updated successfully');
    }

    public function destroy($id) {
        User::find($id)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Item deleted successfully');
    }
}
