<?php

namespace App\Services\Job;

use Rakhiazfa\LaravelSarp\Service\ServiceImplementation;
use App\Repositories\Job\JobRepository;

class JobServiceImplementation extends ServiceImplementation implements JobService
{
    /**
     * @param JobRepository $repository
     */
    public function __construct(JobRepository $repository)
    {
        $this->repository = $repository;
    }
}
