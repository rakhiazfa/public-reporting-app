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

        Route::post('/{slug}/accept', [SocietyReportController::class, 'accept'])->name('.accept');

        Route::post('/{slug}/reject', [SocietyReportController::class, 'reject'])->name('.reject');

        Route::delete('/{societyReport}', [SocietyReportController::class, 'destroy'])->name('.destroy');
    });
