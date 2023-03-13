<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Employee;
use App\Models\Society;
use App\Models\SocietyReport;
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
        $isAgency = $request->user()->hasRole('agency');
        $isEmployee = $request->user()->hasRole('employee');

        $agencyCount = Agency::get()->count();
        $employeeCount = Employee::get()->count();
        $societyCount = Society::get()->count();
        $reportCount = SocietyReport::get()->count();

        if ($isAgency) {
            $employeeCount = Employee::where('agency_id', $request->user()->agency->id)->get()->count();
            $reportCount = SocietyReport::where('destination_agency_id', $request->user()->agency->id)->get()->count();
        } elseif ($isEmployee) {
            $employeeCount = Employee::where('agency_id', $request->user()->employee->agency->id)->get()->count();
            $reportCount = SocietyReport::where('destination_agency_id', $request->user()->employee->agency->id)->get()->count();
        }

        return view('dashboard')->with([
            'agencyCount' => $agencyCount,
            'employeeCount' => $employeeCount,
            'societyCount' => $societyCount,
            'reportCount' => $reportCount,
        ]);
    }
}
