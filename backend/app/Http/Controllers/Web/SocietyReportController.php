<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\ExceptionResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\SocietyReport\StoreSocietyReportRequest;
use App\Models\SocietyReport;
use App\Models\User;
use App\Services\SocietyReport\SocietyReportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SocietyReportController extends Controller
{
    /**
     * @var SocietyReportService
     */
    protected SocietyReportService $societyReportService;

    /**
     * @param SocietyReportService $societyReportService
     */
    public function __construct(SocietyReportService $societyReportService)
    {
        $this->societyReportService = $societyReportService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        try {

            if ($user->hasRole('admin')) {
                $societyReports = $this->societyReportService->orderByIdDesc();
            } else if ($user->hasRole('agency')) {
                $societyReports = SocietyReport::where('destination_agency_id', $user->agency->id)->get();
            } else if ($user->hasRole('employee')) {
                $societyReports = SocietyReport::where('destination_agency_id', $user->employee->agency->id)->get();
            }

            $societyReports->load('author', 'category', 'destination');

            // 
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return view('society-report', compact('societyReports'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, string $slug)
    {
        $user = $request->user();

        $destinationAgencyId = $user->hasRole('agency') ?
            ($user->agency->id ?? null) : ($user->employee->agency->id ?? null);

        $report = SocietyReport::where('slug', $slug)->first() ?? null;

        if (!$report || ($user->hasRole('admin') ? false : $report->destination_agency_id !== $destinationAgencyId)) {

            return $request->expectsJson() ? response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Not found',
            ], 404) : abort(404);
        }

        $report->load('author', 'category', 'destination');

        return view('society-report.show', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  SocietyReport $societyReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, SocietyReport $societyReport)
    {
        if (Storage::disk('public')->exists($societyReport->attachment)) {

            Storage::disk('public')->delete($societyReport->attachment);
        }

        $societyReport->delete();

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Successfully deleted society report.',
        ], 200);
    }
}
