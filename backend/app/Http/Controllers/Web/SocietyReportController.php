<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\ExceptionResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\SocietyReport\StoreSocietyReportRequest;
use App\Models\Message;
use App\Models\ReportRejected;
use App\Models\Response;
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
        $q = $request->get('q', false);

        try {

            if ($user->hasRole('admin')) {
                $societyReports = SocietyReport::when($q, function ($query) use ($q) {
                    $query->where('title', 'LIKE', "%$q%")->orWhere('ticket_id', 'LIKE', "%$q%");
                })->orderBy('id', 'DESC')->paginate(15);
            } else if ($user->hasRole('agency')) {
                $societyReports = SocietyReport::when($q, function ($query) use ($q) {
                    $query->where('title', 'LIKE', "%$q%")->orWhere('ticket_id', 'LIKE', "%$q%");
                })->where('destination_agency_id', $user->agency->id)->orderBy('id', 'DESC')->paginate(15);
            } else if ($user->hasRole('employee')) {
                $societyReports = SocietyReport::when($q, function ($query) use ($q) {
                    $query->where('title', 'LIKE', "%$q%")->orWhere('ticket_id', 'LIKE', "%$q%");
                })->where('destination_agency_id', $user->employee->agency->id)->orderBy('id', 'DESC')->paginate(15);
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

        $report->load('author', 'category', 'destination', 'messages', 'messages.messageOrigin');

        return view('society-report.show', compact('report'));
    }

    /**
     * Reject the society report.
     * 
     * @param Request $request
     * @param string $slug
     * 
     * @return Response
     */
    public function reject(Request $request, string $slug)
    {
        $request->validate(['reason' => ['required']]);

        $report = SocietyReport::where('slug', $slug)->first() ?? null;

        $report->status = 'rejected';
        $report->save();

        $reportRejected = new ReportRejected($request->all());
        $reportRejected->societyReport()->associate($report);
        $reportRejected->save();

        return back()->with('success', 'Laporan berhasil ditolak.');
    }

    /**
     * Accept the society report.
     * 
     * @param Request $request
     * @param string $slug
     * 
     * @return Response
     */
    public function accept(Request $request, string $slug)
    {
        $report = SocietyReport::where('slug', $slug)->first() ?? null;

        $report->status = 'accepted';
        $report->save();

        return back()->with('success', 'Laporan berhasil diterima.');
    }

    public function sendResponse(Request $request, string $slug)
    {
        $report = SocietyReport::where('slug', $slug)->first() ?? null;

        $request->validate(['message' => ['required']]);

        $message = new Message($request->all());
        $message->societyReport()->associate($report);
        $message->messageOrigin()->associate($request->user());
        $message->messageDestination()->associate($report->author->user);
        $message->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  SocietyReport $societyReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, SocietyReport $societyReport)
    {
        $user = $request->user();

        $destinationAgencyId = $user->hasRole('agency') ?
            ($user->agency->id ?? null) : ($user->employee->agency->id ?? null);

        if (
            !$societyReport ||
            ($user->hasRole('admin') ? false : $societyReport->destination_agency_id !== $destinationAgencyId)
        ) {

            return $request->expectsJson() ? response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Not found',
            ], 404) : abort(404);
        }

        if (Storage::disk('public')->exists($societyReport->attachment)) {

            Storage::disk('public')->delete($societyReport->attachment);
        }

        $societyReport->delete();

        return redirect()->route('society-reports')->with('success', 'Berhasil menghapus laporan.');
    }
}
