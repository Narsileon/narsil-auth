<?php

#region USE

use Illuminate\Support\Facades\Route;
use Narsil\Auth\Http\Controllers\Sessions\SessionController;
use Narsil\Auth\Http\Controllers\Sessions\SessionDeleteAllController;
use Narsil\Auth\Http\Controllers\Sessions\SessionDeleteOtherController;

#endregion

Route::middleware([
    'web'
])->group(function ()
{
    Route::delete('sessions/{session}/destroy', [SessionController::class, "destroy"])
        ->name('sessions.destroy');
    Route::get('sessions/destroy-all', SessionDeleteAllController::class)
        ->name('sessions.destroy-all');
    Route::get('sessions/destroy-other', SessionDeleteOtherController::class)
        ->name('sessions.destroy-other');
});
