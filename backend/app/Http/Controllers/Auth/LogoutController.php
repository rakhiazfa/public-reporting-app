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
    public function __invoke(Request $request)
    {
        Auth::logout();

        !$request->expectsJson() && $request->session()->invalidate() && $request->session()->regenerateToken();

        return $request->expectsJson() ? response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Successfully logged out.',
        ], 200) : redirect()->route('auth.login');
    }
}
