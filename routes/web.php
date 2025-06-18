<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

// Redirect root ke login
Route::get('/', fn() => redirect('/login'));
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ADMIN ROUTES
Route::middleware(['auth', 'is_admin'])->group(function () {

    // products
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
});

// USER ROUTES
Route::middleware(['auth', 'is_user'])->group(function () {

    // products
    Route::get('/products', [ProductController::class, 'index'])->name('user.products.index');
    Route::post('/products/{product}/buy', [ProductController::class, 'buy'])->name('user.products.buy');
    Route::post('/products/{id}/beli', [ProductController::class, 'beli'])->name('products.buy');
});

// Register
Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');