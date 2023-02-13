<?php

namespace App\Repositories\AgencyLocation;

use Rakhiazfa\LaravelSarp\Repository\RepositoryModel;
use Illuminate\Database\Eloquent\Model;
use App\Models\AgencyLocation;
use App\Repositories\AgencyLocation\AgencyLocationRepository;

/**
* AgencyLocationRepositoryModel class.
*
*/

class AgencyLocationRepositoryModel extends RepositoryModel implements AgencyLocationRepository 
{
    /**
     * @param Model $model
     *
     */
    public function __construct(AgencyLocation $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * 
     * @return Model
     */
    public function new(array $attributes = []): AgencyLocation
    {
        return new AgencyLocation($attributes);
    }
}