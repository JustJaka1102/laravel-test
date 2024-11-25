<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::view('/','auth.login')->name('login');

Route::view('/register','auth.register')->name('register');
Route::post('/register',[AuthController::class,'register']);
