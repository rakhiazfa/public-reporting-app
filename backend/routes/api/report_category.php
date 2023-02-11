<?php

use App\Http\Controllers\ReportCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Report Category Routes
|--------------------------------------------------------------------------
*/

Route::name('report-categories')->prefix('report-categories')->middleware(['auth:api', 'role:admin'])->group(function () {

    Route::get('/', [ReportCategoryController::class, 'index'])->withoutMiddleware(['auth:api', 'role:admin']);

    Route::post('/', [ReportCategoryController::class, 'store'])->name('.store');

    Route::get('/{reportCategory}', [ReportCategoryController::class, 'show'])->name('.show');

    Route::put('/{reportCategory}', [ReportCategoryController::class, 'update'])->name('.update');

    Route::delete('/{reportCategory}', [ReportCategoryController::class, 'destroy'])->name('.destroy');
});
