<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Log the user out of the application.
     */
    public function __invoke()
    {
        Auth::logout();

        return response()->json([
            'success' => true,
            'message' => 'Successfully logged out.',
        ], 200);
    }
}
