<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

// Route::post('/login', [LoginController::class, 'login'])->middleware('throttle:5,1');
Route::get('/login', [LoginController::class, 'viewLoginForm']);
Route::post('/login', [LoginController::class, 'login']);
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/register', [RegisterController::class, 'viewRegisterForm'])->name('register');
// Route::post('/register', [RegisterController::class, 'register']);

use App\Http\Controllers\UserController;
Route::get('users', [UserController::class, 'index']);
