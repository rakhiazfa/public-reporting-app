<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DashboardController extends Controller
{
    /**
     * @param Request $request
     * 
     * @return Response
     */
    public function __invoke(Request $request)
    {
        return view('dashboard');
    }
}
