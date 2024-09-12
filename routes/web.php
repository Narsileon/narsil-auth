<?php

#region USE

use Illuminate\Support\Facades\Route;
use Narsil\Auth\Http\Controllers\Profile\PasswordUpdateController;
use Narsil\Auth\Http\Controllers\Profile\ProfileEditController;
use Narsil\Auth\Http\Controllers\Profile\ProfileIndexController;
use Narsil\Auth\Http\Controllers\Profile\ProfileUpdateController;
use Narsil\Auth\Http\Controllers\Sessions\SessionDeleteAllController;
use Narsil\Auth\Http\Controllers\Sessions\SessionDeleteController;
use Narsil\Auth\Http\Controllers\Sessions\SessionDeleteOtherController;

#endregion

Route::middleware([
    'web',
    'auth',
])->group(function ()
{
    // Profile
    Route::get('profile', ProfileIndexController::class)
        ->name('profile');
    Route::get('profile/edit', ProfileEditController::class)
        ->name('profile.edit');
    Route::patch('profile/password', PasswordUpdateController::class)
        ->name('profile.password');
    Route::patch('profile/update', ProfileUpdateController::class)
        ->name('profile.update');

    // Sessions
    Route::delete('sessions/{session}/destroy', [SessionDeleteController::class, 'destroy'])
        ->name('sessions.destroy');
    Route::get('sessions/destroy-all', SessionDeleteAllController::class)
        ->name('sessions.destroy-all');
    Route::get('sessions/destroy-other', SessionDeleteOtherController::class)
        ->name('sessions.destroy-other');
});
