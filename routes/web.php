<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasswordResetController;

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::controller(AuthController::class)->group(function () {
    // Login Routes
    Route::get('/', 'showLoginForm')->name('auth.start');
    Route::get('/login', 'showLoginForm')->name('auth.login');
    Route::post('/login', 'login')->name('auth.login.submit');

    // Registration Routes
    Route::get('/register', 'showRegisterForm')->name('auth.register');
    Route::post('/register', 'register')->name('auth.register.submit');

    // Logout Route
    Route::post('/logout', 'logout')->name('auth.logout');
});

/*
|--------------------------------------------------------------------------
| Password Reset Routes
|--------------------------------------------------------------------------
*/
Route::controller(PasswordResetController::class)->prefix('password')->group(function () {
    // Forgot Password
    Route::get('/forgot', 'showLinkRequestForm')->name('password.request');
    Route::post('/email', 'sendResetLinkEmail')->name('password.email');

    // Reset Password
    Route::get('/reset/{token}', 'showResetForm')->name('password.reset');
    Route::post('/reset', 'reset')->name('password.update');
});

/*
|--------------------------------------------------------------------------
| Dashboard (Protected)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::prefix('members')->name('members.')->controller(MemberController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{member}/edit', 'edit')->name('edit');
        Route::put('/{member}', 'update')->name('update');
        Route::delete('/{member}', 'destroy')->name('destroy');
    });
});
