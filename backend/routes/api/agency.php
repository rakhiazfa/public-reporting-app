<?php

use App\Http\Controllers\AgencyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Agency Routes
|--------------------------------------------------------------------------
*/

Route::name('agencies')->prefix('agencies')->middleware(['auth:api', 'role:admin'])->group(function () {

    Route::get('/', [AgencyController::class, 'index'])->withoutMiddleware(['auth:api', 'role:admin']);

    Route::post('/', [AgencyController::class, 'store'])->name('.store');

    Route::get('/{agency}', [AgencyController::class, 'show'])->name('.show');

    Route::put('/{agency}', [AgencyController::class, 'update'])->name('.update');

    Route::delete('/{agency}', [AgencyController::class, 'destroy'])->name('.destroy');
});
