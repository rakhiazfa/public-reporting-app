<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\ExceptionResponse;
use App\Http\Controllers\Controller;
use App\Models\SocietyReport;
use App\Services\SocietyReport\SocietyReportService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user();

        try {

            if ($user->hasRole('admin')) {
                $societyReports = SocietyReport::with('destination', 'author')->orderBy('id', 'DESC')->paginate(15);
            } else if ($user->hasRole('agency')) {
                $societyReports = SocietyReport::with('destination', 'author')->where('destination_agency_id', $user->agency->id)->orderBy('id', 'DESC')->paginate(15);
            } else if ($user->hasRole('employee')) {
                $societyReports = SocietyReport::with('destination', 'author')->where('destination_agency_id', $user->employee->agency->id)->orderBy('id', 'DESC')->paginate(15);
            }

            $societyReports->load('author', 'category', 'destination', 'author.user', 'destination.user');

            // 
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return view('report')->with('reports', $societyReports);
    }

    public function generate(Request $request)
    {
        $user = $request->user();

        try {

            if ($user->hasRole('admin')) {
                $societyReports = SocietyReport::with('destination', 'author')->orderBy('id', 'DESC')->paginate(15);
            } else if ($user->hasRole('agency')) {
                $societyReports = SocietyReport::with('destination', 'author')->where('destination_agency_id', $user->agency->id)->orderBy('id', 'DESC')->paginate(15);
            } else if ($user->hasRole('employee')) {
                $societyReports = SocietyReport::with('destination', 'author')->where('destination_agency_id', $user->employee->agency->id)->orderBy('id', 'DESC')->paginate(15);
            }

            $societyReports->load('author', 'category', 'destination', 'author.user', 'destination.user', 'author.job');

            // 
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return view('print_report')->with('reports', $societyReports);
    }
}
