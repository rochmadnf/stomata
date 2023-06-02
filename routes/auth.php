<?php

use App\Http\Controllers\Auth\{LoginController, RegisterController};
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->prefix('login')->group(function () {
    Route::get('', 'index')->name('auth.ilogin');
    Route::post('', 'logIn')->name('auth.login');
});

Route::controller(ResetPasswordController::class)->group(function () {
    Route::prefix('forget-password')->group(function () {
        Route::get('', 'index')->name('auth.ireset_password');
        Route::post('', 'reset')->name('auth.reset_password');
    });

    Route::get('reset/{email}', 'executeReset')->middleware('signed')->name('auth.reset_url');
    Route::get(
        'reset-password/success',
        function () {
            return view('pages.reset-success');
        }
    )->name('auth.reset_success');
});

Route::middleware('auth')->post('logout', function () {
    auth()->logout();

    return redirect()->route('auth.ilogin');
})->name('logout');

Route::controller(RegisterController::class)->prefix('register')->group(function () {
    Route::get('', 'index')->name('auth.iregister');
    Route::post('', 'store')->name('auth.register');
    Route::get('success', 'congrats')->name('auth.register.success');
});
