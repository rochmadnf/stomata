<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->prefix('login')->group(function () {
    Route::get('', 'index')->name('auth.ilogin');
    Route::post('', 'logIn')->name('auth.login');
});
