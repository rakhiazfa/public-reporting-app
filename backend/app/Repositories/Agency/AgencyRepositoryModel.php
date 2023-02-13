<?php

namespace App\Repositories\Agency;

use Rakhiazfa\LaravelSarp\Repository\RepositoryModel;
use Illuminate\Database\Eloquent\Model;
use App\Models\Agency;
use App\Repositories\Agency\AgencyRepository;

/**
* AgencyRepositoryModel class.
*
*/

class AgencyRepositoryModel extends RepositoryModel implements AgencyRepository 
{
    /**
     * @param Model $model
     *
     */
    public function __construct(Agency $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * 
     * @return Model
     */
    public function new(array $attributes = []): Agency
    {
        return new Agency($attributes);
    }
}