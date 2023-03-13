<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\ExceptionResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Employee;
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
    public function index(Request $request)
    {
        $q = $request->get('q', false);

        try {

            $employees = Employee::when($q, function ($query) use ($q) {
                $query->whereHas('user', function ($query) use ($q) {
                    $query->where('name', 'LIKE', "%$q%")->orWhere('email', 'LIKE', "%$q%");
                });
            })->with('user', 'agency')->orderBy('id', 'DESC')->paginate(10);

            $employees->withQueryString();

            if (!$request->user()->hasRole('admin')) {

                $employees = Employee::when($q, function ($query) use ($q) {
                    $query->whereHas('user', function ($query) use ($q) {
                        $query->where('name', 'LIKE', "%$q%")->orWhere('email', 'LIKE', "%$q%");
                    });
                })->with('user', 'agency')->where('agency_id', $request->user()->agency->id)
                    ->orderBy('id', 'DESC')->paginate(10);

                $employees->withQueryString();
            }

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
        try {

            $this->employeeService->createEmployee($request->all());

            // 
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return redirect()->route('employees')->with('success', 'Berhasil mendaftarkan petugas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $this->authorize('view', [Employee::class, $employee]);

        $employee->load(['user', 'agency']);

        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee, AgencyService $agencyService)
    {
        $this->authorize('update', [Employee::class, $employee]);

        $employee->load(['user', 'agency']);

        try {

            $agencies = $agencyService->orderByIdDesc();

            // 
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return view('employee.edit', compact('employee', 'agencies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $this->authorize('update', [Employee::class, $employee]);

        try {

            $this->employeeService->updateEmployee($employee, $request->all());

            // 
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return redirect()->route('employees.edit', ['employee' => $employee])
            ->with('success', 'Berhasil memperbarui petugas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $this->authorize('delete', [Employee::class, $employee]);

        try {

            $this->employeeService->deleteEmployee($employee);

            // 
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return redirect()->route('employees')->with('success', 'Berhasil menghapus petugas.');
    }
}
