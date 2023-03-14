<?php

use App\Http\Controllers\Web\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Report Routes
|--------------------------------------------------------------------------
*/

Route::name('reports')->prefix('reports')->middleware(['auth:web', 'role:admin,agency'])->group(function () {

    Route::get('/', ReportController::class);

    Route::get('/generate', [ReportController::class, 'generate'])->name('.generate');
});
