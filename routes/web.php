<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/','index')->name('home');


Route::view('/login','auth.login')->name('login');
Route::post('/login',[AuthController::class,'login']);

Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::view('/register','auth.register')->name('register');
Route::post('/register',[AuthController::class,'register']);

Route::view('/dashboard','dashboard.dashboard')->name('dashboard');

Route::get('/dashboard/users', [UserController::class, 'index'])->name('dashboard.users');

Route::post('/dashboard/user_add',[UserController::class,'store']);
Route::view('/dashboard/user_add','dashboard.content.user_add')->name('dashboard.user_add');

Route::resource('users', UserController::class);