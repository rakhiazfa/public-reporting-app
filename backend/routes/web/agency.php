<?php

use App\Http\Controllers\Web\AgencyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Agency Routes
|--------------------------------------------------------------------------
*/

Route::name('agencies')->prefix('agencies')->middleware(['auth:web', 'role:admin'])->group(function () {

    Route::get('/', [AgencyController::class, 'index']);

    Route::get('/create', [AgencyController::class, 'create'])->name('.create');

    Route::post('/', [AgencyController::class, 'store'])->name('.store');

    Route::get('/{agency}', [AgencyController::class, 'show'])->name('.show');

    Route::get('/{agency}/edit', [AgencyController::class, 'edit'])->name('.edit');

    Route::put('/{agency}', [AgencyController::class, 'update'])->name('.update');

    Route::delete('/{agency}', [AgencyController::class, 'destroy'])->name('.destroy');
});
