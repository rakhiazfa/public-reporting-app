<?php

namespace App\Http\Controllers;

use App\Exceptions\ExceptionResponse;
use App\Http\Requests\ReportCategory\StoreReportCategoryRequest;
use App\Http\Requests\ReportCategory\UpdateReportCategoryRequest;
use App\Models\ReportCategory;
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
    public function index(Request $request)
    {
        $withSubcategories = filter_var(
            $request->get('with-subcategories', false),
            FILTER_VALIDATE_BOOL,
        );

        try {

            $reportCategories = $this->reportCategoryService->orderByIdDesc();

            $withSubcategories && $reportCategories->load('reportSubcategories');

            // 
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return response()->json([
            'success' => true,
            'code' => 200,
            'report_categories' => $reportCategories,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportCategoryRequest $request)
    {
        try {

            $reportCategory = $this->reportCategoryService->create($request->only(['name']));

            // 
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Successfully created a new report category.',
            'report_category' => $reportCategory,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  ReportCategory $reportCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ReportCategory $reportCategory)
    {
        $withSubcategories = filter_var(
            $request->get('with-subcategories', false),
            FILTER_VALIDATE_BOOL,
        );

        $withSubcategories && $reportCategory->load('reportSubcategories');

        return response()->json([
            'success' => true,
            'code' => 200,
            'report_category' => $reportCategory,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ReportCategory $reportCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReportCategoryRequest $request, ReportCategory $reportCategory)
    {
        $reportCategory->update($request->all());

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Successfully updated report category.',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ReportCategory $reportCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportCategory $reportCategory)
    {
        $reportCategory->delete();

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Successfully deleted report category.',
        ], 200);
    }
}
