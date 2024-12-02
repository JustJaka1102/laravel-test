<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('home');


Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::view('/dashboard', 'dashboard.dashboard')->name('dashboard');

Route::get('/dashboard/users', [UserController::class, 'index'])->name('dashboard.users');
Route::post('/dashboard/user_add', [UserController::class, 'store']);
Route::view('/dashboard/user_add', 'dashboard.content.user_add')->name('dashboard.user_add');

Route::get('/dashboard/categories', [ProductCategoryController::class, 'index'])->name('dashboard.categories');
Route::post('/dashboard/category_add', [ProductCategoryController::class, 'store']);
Route::get('/dashboard/category_add', [ProductCategoryController::class, 'select'])->name('dashboard.category_add');




Route::resources([
    'users' => UserController::class,
    'product_category' => ProductCategoryController::class,
    'products' => ProductController::class,
], );



Route::get('/dashboard/products', [ProductController::class, 'index'])->name('dashboard.products');
Route::post('/dashboard/product_add', [ProductController::class, 'store']);
Route::get('/dashboard/product_add', [ProductController::class, 'create'])->name(name: 'dashboard.product_add');
