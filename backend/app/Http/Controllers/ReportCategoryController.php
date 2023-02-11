<?php

namespace App\Http\Controllers;

use App\Services\ReportCategory\ReportCategoryService;
use Illuminate\Http\Request;

class ReportCategoryController extends Controller
{
    /**
     * @var ReportCategoryService
     */
    protected ReportCategoryService $reportCategoryService;

    /**
     * @param ReportCategoryService $reportCategoryService
     */
    public function __construct(ReportCategoryService $reportCategoryService)
    {
        $this->reportCategoryService = $reportCategoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $reportCategories = $this->reportCategoryService->orderByIdDesc();

            // 
        } catch (\Exception $exception) {

            return response()->json([
                'success' => false,
                'code' => $exception->getCode(),
                'message' => $exception->getMessage(),
            ], $exception->getCode());
        }

        return response()->json([
            'success' => true,
            'code' => 202,
            'report_categories' => $reportCategories,
        ], 202);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
