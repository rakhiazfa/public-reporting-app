<?php

namespace App\Services\Job;

use App\Foundation\Service\ServiceImplementation;
use App\Repositories\Job\JobRepository;

class JobServiceImplementation extends ServiceImplementation implements JobService
{
    /**
     * @var JobRepository
     */
    protected JobRepository $jobRepository;

    /**
     * @param JobRepository $jobRepository
     */
    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }
}
