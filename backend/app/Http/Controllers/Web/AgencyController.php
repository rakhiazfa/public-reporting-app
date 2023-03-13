<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\ExceptionResponse;
use App\Http\Controllers\Controller;
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
    public function index(Request $request)
    {
        try {

            $agencies = Agency::with('user', 'location')->orderBy('id', 'DESC')->paginate(10);

            // 
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return view('agency', compact('agencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agency.create');
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

        return redirect()->route('agencies')->with('success', 'Berhasil mendaftarkan instansi.');
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

        return view('agency.show', compact('agency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Agency $agency
     * @return \Illuminate\Http\Response
     */
    public function edit(Agency $agency)
    {
        $agency->load('location', 'user');

        return view('agency.edit', compact('agency'));
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

        return redirect()->route('agencies.edit', ['agency' => $agency])
            ->with('success', 'Berhasil memperbarui instansi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Agency $agency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agency $agency)
    {
        try {

            $this->agencyService->deleteAgency($agency);

            // 
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return redirect()->route('agencies')->with('success', 'Berhasil menghapus instansi.');
    }
}
