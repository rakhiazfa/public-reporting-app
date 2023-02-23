<?php

namespace App\Http\Controllers;

use App\Exceptions\ExceptionResponse;
use App\Http\Requests\SocietyReport\StoreSocietyReportRequest;
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
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
