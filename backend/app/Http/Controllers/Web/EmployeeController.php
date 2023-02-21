<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\ExceptionResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Services\Agency\AgencyService;
use App\Services\Employee\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * @var EmployeeService
     */
    protected EmployeeService $employeeService;

    /**
     * @param EmployeeService $employeeService
     */
    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $employees = $this->employeeService->orderByIdDesc();

            $employees->load('agency', 'user');

            // 
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return view('employee', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AgencyService $agencyService)
    {
        try {

            $agencies = $agencyService->orderByIdDesc();

            // 
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return view('employee.create', compact('agencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
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
