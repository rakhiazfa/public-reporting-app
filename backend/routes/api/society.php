<?php

use App\Http\Controllers\SocietyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Society Routes
|--------------------------------------------------------------------------
*/

Route::name('societies')->prefix('societies')->middleware(['auth:api', 'role:admin'])->group(function () {

    Route::get('/', [SocietyController::class, 'index']);

    Route::post('/', [SocietyController::class, 'store'])
        ->withoutMiddleware(['auth:api', 'role:admin'])->name('.store');

    Route::get('/{society}', [SocietyController::class, 'show'])->name('.show');

    Route::put('/{society}', [SocietyController::class, 'update'])->withoutMiddleware(['role:admin'])->name('.update');

    Route::delete('/{society}', [SocietyController::class, 'destroy'])->name('.destroy');
});
