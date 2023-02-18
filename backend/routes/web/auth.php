<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Route::name('auth')->prefix('auth')->middleware('guest:web')->group(function () {

    Route::view('/login', 'auth.login')->name('.login');

    Route::post('/login', LoginController::class);

    Route::get('/logout', LogoutController::class)
        ->withoutMiddleware('guest:web')
        ->middleware('auth:web')->name('.logout');
});
