<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::controller(UserController::class)->prefix('users')->group(function () {
        Route::get('active', 'index')->name('users.active');
        Route::get('non-active', 'indexNon')->name('users.nonActive');
    });

    Route::get('/profile', function () {
        return view('pages.profile');
    })->name('profile');
});

Route::prefix('api')->group(function () {
    Route::get('user-coords', function () {
        return response()->json(User::all());
    });
});
