<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {

    $user = $request->user();
    $user->load('role');

    return response()->json([
        'success' => true,
        'code' => 200,
        'user' => $user,
    ], 200);
});

/**
 * Load auth routes.
 * 
 */

require_once __DIR__ . '/api/auth.php';

/**
 * Load job routes.
 * 
 */

require_once __DIR__ . '/api/job.php';

/**
 * Load report category routes.
 * 
 */

require_once __DIR__ . '/api/report_category.php';

/**
 * Load agency routes.
 * 
 */

require_once __DIR__ . '/api/agency.php';
