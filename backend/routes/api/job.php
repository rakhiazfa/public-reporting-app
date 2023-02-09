<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Job Routes
|--------------------------------------------------------------------------
*/

Route::name('jobs')->prefix('jobs')->middleware(['auth:api', 'role:admin'])->group(function () {

    Route::get('/', [JobController::class, 'index'])->withoutMiddleware(['auth:api', 'role:admin']);

    Route::post('/', [JobController::class, 'store'])->name('.store');

    Route::get('/{job}', [JobController::class, 'show'])->name('.show');

    Route::put('/{job}', [JobController::class, 'update'])->name('.update');

    Route::delete('/{job}', [JobController::class, 'destroy'])->name('.destroy');
});
