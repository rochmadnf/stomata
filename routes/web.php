<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::get('/users', function () {
        return view('pages.users');
    })->name('users');

    Route::get('/profile', function () {
        return view('pages.profile');
    })->name('profile');
});
