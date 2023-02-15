<?php

namespace App\Http\Controllers;

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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSocietyRequest $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  Society $society
     * @return \Illuminate\Http\Response
     */
    public function show(Society $society)
    {
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Society $society
     * @return \Illuminate\Http\Response
     */
    public function destroy(Society $society)
    {
    }
}
