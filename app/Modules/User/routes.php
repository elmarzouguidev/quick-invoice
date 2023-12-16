<?php

use App\Modules\User\Controllers\{
    UserController,
    UpdateUserController,
};
use Illuminate\Support\Facades\Route;

Route::prefix('user')
    ->as('user::')
    ->group(function () {
        Route::get('home', UserController::class)->name('home');
        Route::post('update', UpdateUserController::class)->name('update');
    });
