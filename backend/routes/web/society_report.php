<?php

use App\Http\Controllers\Web\SocietyReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Society Report Routes
|--------------------------------------------------------------------------
*/

Route::name('society-reports')->prefix('society-reports')
    ->middleware(['auth:web', 'role:admin,agency,employee'])->group(function () {

        Route::get('/', [SocietyReportController::class, 'index']);

        Route::get('/{slug}', [SocietyReportController::class, 'show'])->name('.show');

        Route::delete('/{societyReport}', [SocietyReportController::class, 'destroy'])->name('.destroy');
    });
