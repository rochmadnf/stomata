<?php

use App\Http\Controllers\{UpdateEmailController, UpdatePasswordController, UpdatePersonalController, UserController};
use App\Models\User;
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
        Route::put('{user_id}', 'promoteAdmin')->name('users.promote');
        Route::patch('{user_id}', 'activation')->name('users.activation');
        Route::delete('{user_id}', 'destroy')->name('users.destroy');
    });

    Route::get('profile/{user_id}', [UserController::class, 'show'])->name('profile');

    Route::get('profile/{user_id}/edit', [UserController::class, 'edit'])->name('profile.edit');

    Route::prefix('profile/update')->group(function () {
        Route::post('email/{id}', UpdateEmailController::class)->name('profile.update.email');
        Route::get('email/rollback/{user_id}', [UpdateEmailController::class, 'rollback'])->name('profile.rollback.email');

        Route::post('password/{id}', UpdatePasswordController::class)->name('profile.update.password');
        Route::post('personal/{id}', UpdatePersonalController::class)->name('profile.update.personal');
    });
});
