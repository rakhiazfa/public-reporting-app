<?php

namespace App\Http\Controllers;

use App\Exceptions\ExceptionResponse;
use App\Http\Requests\ReportSubcategory\StoreReportSubcategoryRequest;
use App\Models\ReportCategory;
use App\Services\ReportCategory\ReportCategoryService;
use Illuminate\Http\Request;

class ReportSubcategoryController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportSubcategoryRequest $request, ReportCategory $reportCategory)
    {
        try {

            $reportSubcategory = $this->reportCategoryService->createSubcategory(
                $reportCategory,
                $request->only(['name']),
            );

            // 
        } catch (\Exception $exception) {

            return new ExceptionResponse($exception);
        }

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Successfully created a new report subcategory.',
            'report_subcategory' => $reportSubcategory,
        ], 201);
    }
}
