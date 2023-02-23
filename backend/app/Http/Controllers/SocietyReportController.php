<?php

namespace App\Http\Controllers;

use App\Exceptions\ExceptionResponse;
use App\Http\Requests\SocietyReport\StoreSocietyReportRequest;
use App\Models\SocietyReport;
use App\Services\SocietyReport\SocietyReportService;
use Illuminate\Http\Request;

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
    public function index()
    {
        try {

            $societyReports = $this->societyReportService->orderByIdDesc();
            $societyReports->load('author', 'category', 'destination');

            // 
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }


        return response()->json([
            'success' => true,
            'code' => 200,
            'society_reports' => $societyReports,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSocietyReportRequest $request, string $username)
    {
        /**
         * Upload attachment file.
         * 
         */

        $attachment = $request->file('attachment');

        $attachment = $attachment->storeAs(
            'attachments/' . $username,
            date('Y_m_d_H_i_s') . '.' . $attachment->getClientOriginalExtension(),
            'public'
        );

        $data = $request->except('attachment');
        $data['attachment'] = $attachment;

        try {

            $societyReport = $this->societyReportService->createReport($request->user()->society, $data);

            // 
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }


        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Successfully created a new society report.',
            'society_report' => $societyReport,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
        $societyReport = SocietyReport::where('slug', $slug)->first() ?? null;

        if (!$societyReport) {

            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Not found',
            ], 404);
        }

        $societyReport->load('author', 'category', 'destination');

        return response()->json([
            'success' => true,
            'code' => 200,
            'society_report' => $societyReport,
        ], 200);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}