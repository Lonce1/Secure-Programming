<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotpasswordController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UpdateController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'viewLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name("login.post");

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::middleware("auth:web")->group(function () {
    Route::get("/service", [AccessController::class, 'serviceIndex'])->name("service");
    Route::get("/home", [AccessController::class, 'homeIndex'])->name("home");
});

Route::middleware("auth:admin")->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/updateprofile', [UpdateController::class, 'viewUpdate'])->name('updateprofile');
Route::post('/update-profile', [UpdateController::class, 'updateProfile'])->name('update-profile');

Route::get("/forgotpassword", [ForgotpasswordController::class, 'showforgotpassword'])->name('forgotpassword');
Route::post("/forgotpassword", [ForgotpasswordController::class, 'forgotpasswordPost'])->name('forgotpassword.post');
Route::get("/resetpassword/{token}", [ForgotpasswordController::class, 'resetpassword'])->name("reset.password");
Route::post("/newpassword", [ForgotpasswordController::class, 'resetpasswordPost'])->name("reset.password.post");


Route::get('/404', function () {
    return view('404');
});

use App\Http\Controllers\UserController;
Route::get('users', [UserController::class, 'index']);
