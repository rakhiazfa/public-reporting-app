<?php

namespace App\Http\Controllers;

use App\Exceptions\ExceptionResponse;
use App\Http\Requests\Job\StoreJobRequest;
use App\Http\Requests\Job\UpdateJobRequest;
use App\Models\Job;
use App\Services\Job\JobService;

class JobController extends Controller
{
    /**
     * @var JobService
     */
    protected JobService $jobService;

    /**
     * @param JobService $jobService
     */
    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $jobs = $this->jobService->orderByIdDesc();

            // 
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return response()->json([
            'success' => true,
            'code' => 200,
            'jobs' => $jobs,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobRequest $request)
    {
        try {

            $job = $this->jobService->create($request->only(['name']));

            // 
        } catch (\Exception $exception) {

            return (new ExceptionResponse($exception))->json();
        }

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Successfully created a new job.',
            'job' => $job,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Job $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return response()->json([
            'success' => true,
            'code' => 200,
            'job' => $job,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Job $job
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        $job->update($request->all());

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Successfully updated job.',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Job $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Successfully deleted job.',
        ], 200);
    }
}
