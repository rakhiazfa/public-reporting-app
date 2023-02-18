<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Route::name('auth')->prefix('auth')->group(function () {

    Route::view('/login', 'auth.login')->name('.login');

    Route::withoutMiddleware('auth')->post('/login', LoginController::class);

    Route::post('/logout', LogoutController::class)->middleware('auth')->name('.logout');
});
