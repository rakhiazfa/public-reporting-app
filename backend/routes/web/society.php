<?php

use App\Http\Controllers\Web\SocietyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Society Routes
|--------------------------------------------------------------------------
*/

Route::name('societies')->prefix('societies')->middleware(['auth:web', 'role:admin'])->group(function () {

    Route::get('/', [SocietyController::class, 'index']);

    Route::get('/{society}', [SocietyController::class, 'show'])->name('.show');

    Route::get('/{society}/edit', [SocietyController::class, 'edit'])->name('.edit');

    Route::put('/{society}', [SocietyController::class, 'update'])->name('.update');

    Route::delete('/{society}', [SocietyController::class, 'destroy'])->name('.destroy');
});
