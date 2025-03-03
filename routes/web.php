<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('', [UserController::class, 'login'])->name('user-login');
Route::post('user/login/post', [UserController::class, 'loginPost'])->name('user-login-post');
Route::get('user/dashboard', [UserController::class, 'userDashboard'])->name('user-dashboard');
