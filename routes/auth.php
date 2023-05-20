<?php

use App\Http\Controllers\Auth\{LoginController, RegisterController};
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->prefix('login')->group(function () {
    Route::get('', 'index')->name('auth.ilogin');
    Route::post('', 'logIn')->name('auth.login');
});

Route::controller(RegisterController::class)->prefix('register')->group(function () {
    Route::get('', 'index')->name('auth.iregister');
    Route::post('', 'store')->name('auth.register');
    Route::get('success', 'congrats')->name('auth.register.success');
});
