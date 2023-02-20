<?php

use App\Http\Controllers\Web\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Employee Routes
|--------------------------------------------------------------------------
*/

Route::name('employees')->prefix('employees')->middleware(['auth:web', 'role:admin,agency'])->group(function () {

    Route::get('/', [EmployeeController::class, 'index']);

    Route::get('/create', [EmployeeController::class, 'create'])->name('.create');

    Route::post('/', [EmployeeController::class, 'store'])->name('.store');

    Route::get('/{agency}', [EmployeeController::class, 'show'])->name('.show');

    Route::get('/{agency}/edit', [EmployeeController::class, 'edit'])->name('.edit');

    Route::put('/{agency}', [EmployeeController::class, 'update'])->name('.update');

    Route::delete('/{agency}', [EmployeeController::class, 'destroy'])->name('.destroy');
});
