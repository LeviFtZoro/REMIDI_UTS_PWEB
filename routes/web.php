<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', fn() => redirect('/login'));
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route role-based
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin', fn() => view('admin.dashboard'))->name('admin.dashboard');
});

Route::middleware(['auth', 'is_user'])->group(function () {
    Route::get('/user', fn() => view('user.dashboard'))->name('user.dashboard');
});
