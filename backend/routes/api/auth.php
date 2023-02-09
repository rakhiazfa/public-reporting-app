<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Route::name('auth')->prefix('auth')->middleware('auth:api')->group(function () {

    Route::withoutMiddleware('auth:api')->post('/login', LoginController::class)->name('.login');

    Route::post('/logout', LogoutController::class)->name('.logout');
});
