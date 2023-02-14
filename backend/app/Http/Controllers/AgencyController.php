<?php

namespace App\Http\Controllers;

use App\Exceptions\ExceptionResponse;
use App\Http\Requests\Agency\StoreAgencyRequest;
use App\Http\Requests\Agency\UpdateAgencyRequest;
use App\Models\Agency;
use App\Services\Agency\AgencyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgencyController extends Controller
{
    /**
     * @var AgencyService
     */
    protected AgencyService $agencyService;

    /**
     * @param AgencyService $agencyService
     */
    public function __construct(AgencyService $agencyService)
    {
        $this->agencyService = $agencyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $agencies = $this->agencyService->orderByIdDesc();

            $agencies->load('location');

            // 
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return response()->json([
            'success' => true,
            'code' => 200,
            'agencies' => $agencies,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAgencyRequest $request)
    {
        $request->merge([
            'password' => Hash::make($request->input('password')),
        ]);

        try {

            $agency = $this->agencyService->createAgency($request->all());

            // 
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Successfully created a new agency.',
            'agency' => $agency,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Agency $agency
     * @return \Illuminate\Http\Response
     */
    public function show(Agency $agency)
    {
        $agency->load(['user', 'location']);

        return response()->json([
            'success' => true,
            'code' => 200,
            'agency' => $agency,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Agency $agency
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAgencyRequest $request, Agency $agency)
    {
        try {

            $this->agencyService->updateAgency($agency, $request->all());

            // 
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Successfully updated agency.',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Agency $agency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agency $agency)
    {
        //
    }
}
