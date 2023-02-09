<?php

namespace App\Repositories\Job;

use App\Foundation\Repository\RepositoryModel;
use App\Models\Job;
use Illuminate\Database\Eloquent\Model;

class JobRepositoryModel extends RepositoryModel implements JobRepository
{
    /**
     * @var Model
     */
    protected Model $model;

    /**
     * @param Job $model
     */
    public function __construct(Job $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * 
     * @return Job
     */
    public function new(array $attributes = []): Job
    {
        return new Job($attributes);
    }
}
