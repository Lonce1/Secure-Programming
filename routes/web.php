<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotpasswordController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});

// Route::post('/login', [LoginController::class, 'login'])->middleware('throttle:5,1');
Route::get('/login', [LoginController::class, 'viewLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name("login.post");

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::middleware("auth")->group(function (){
    Route::get("/home", [AccessController::class, 'homeIndex'])->name("home");
    Route::get("/service", [AccessController::class, 'serviceIndex'])->name("service");
});

Route::middleware("admin")->group(function (){
    Route::get("/home", [AccessController::class, 'homeIndex'])->name("home");
    Route::get("/service", [AccessController::class, 'serviceIndex'])->name("service");
    Route::get("/admin", [AccessController::class, 'adminIndex'])->name("admin");
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get("/forgotpassword", [ForgotpasswordController::class, 'showforgotpassword'])->name('forgotpassword');
Route::post("/forgotpassword", [ForgotpasswordController::class, 'forgotpasswordPost'])->name('forgotpassword.post');
Route::get("/resetpassword/{token}", [ForgotpasswordController::class, 'resetpassword'])->name("reset.password");
Route::post("/newpassword", [ForgotpasswordController::class, 'resetpasswordPost'])->name("reset.password.post");


Route::get('/updateprofile', function () {
    return view('updateprofile');
});

use App\Http\Controllers\UserController;
Route::get('users', [UserController::class, 'index']);
