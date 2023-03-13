<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\ExceptionResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Society\UpdateSocietyRequest;
use App\Models\Society;
use App\Services\Job\JobService;
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
    public function index(Request $request)
    {
        $q = $request->get('q', false);

        try {


            $societies = Society::when($q, function ($query) use ($q) {
                $query->whereHas('user', function ($query) use ($q) {
                    $query->where('name', 'LIKE', "%$q%")->orWhere('email', 'LIKE', "%$q%");
                });
            })->with('user', 'location')->orderBy('id', 'DESC')->paginate(10);

            $societies->withQueryString();

            //
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return view('society', compact('societies'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Society $society
     * @return \Illuminate\Http\Response
     */
    public function show(Society $society)
    {
        $society->load('user', 'location', 'job');

        return view('society.show', compact('society'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Society $society
     * @return \Illuminate\Http\Response
     */
    public function edit(Society $society, JobService $jobService)
    {
        $society->load(['user', 'location']);

        try {

            $jobs = $jobService->orderByIdDesc();

            //
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return view('society.edit', compact('society', 'jobs'));
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

            $this->societyService->updateSociety($society, $request->all());

            //
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return redirect()->route('societies.edit', ['society' => $society])->with('success', 'Berhasil memperbarui masyarakat.');
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

        return redirect()->route('societies')->with('success', 'Berhasil menghapus masyarakat.');
    }
}
