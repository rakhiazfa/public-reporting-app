<?php

namespace App\Http\Controllers;

use App\Exceptions\ExceptionResponse;
use App\Http\Requests\Society\StoreSocietyRequest;
use App\Http\Requests\Society\UpdateSocietyRequest;
use App\Models\Society;
use App\Services\Society\SocietyService;
use Illuminate\Http\Request;

class SocietyController extends Controller
{
    /**
     * @var SocietyService
     */
    protected SocietyService $societyService;

    /**
     * @param SocietyService $societyService
     */
    public function __construct(SocietyService $societyService)
    {
        $this->societyService = $societyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $societies = $this->societyService->orderByIdDesc();

            $societies->load('user');

            //
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return response()->json([
            'success' => true,
            'code' => 200,
            'societies' => $societies,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSocietyRequest $request)
    {
        try {

            $society = $this->societyService->createSociety($request->all());

            //
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Registrasi berhasil.',
            'society' => $society,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Society $society
     * @return \Illuminate\Http\Response
     */
    public function show(Society $society)
    {
        $society->load('user', 'location');

        return response()->json([
            'success' => true,
            'code' => 200,
            'society' => $society,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Society $society
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSocietyRequest $request, Society $society)
    {
        try {

            $society = $this->societyService->updateSociety($society, $request->all());

            //
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Berhasil memperbarui masyarakat.',
            'society' => $society,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Society $society
     * @return \Illuminate\Http\Response
     */
    public function destroy(Society $society)
    {
        try {

            $this->societyService->deleteSociety($society);

            // 
        } catch (\Exception $exception) {

            return new ExceptionResponse($exception);
        }

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Successfully deleted society.',
        ], 200);
    }
}
