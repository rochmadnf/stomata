<?php

use App\Events\UpdateDeviceDataEvent;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        if (!auth()->user()->is_admin) {
            $user = User::with('device', 'device.lastDeviceData')->where('id', auth()->id())->firstOrFail();
            return view('pages.dashboard', compact('user'));
        }

        return view('pages.dashboard');
    })->name('dashboard');

    Route::controller(UserController::class)->middleware('isAdmin')->prefix('users')->group(function () {
        Route::get('active', 'index')->name('users.active');
        Route::get('non-active', 'indexNon')->name('users.nonActive');
        Route::patch('{user_id}', 'activation')->name('users.activation');
        Route::delete('{user_id}', 'destroy')->name('users.destroy');
    });

    Route::get('profile/{user_id}', [UserController::class, 'show'])->name('profile');
});
