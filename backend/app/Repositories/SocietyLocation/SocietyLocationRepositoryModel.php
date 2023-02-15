<?php

namespace App\Repositories\SocietyLocation;

use Rakhiazfa\LaravelSarp\Repository\RepositoryModel;
use Illuminate\Database\Eloquent\Model;
use App\Models\SocietyLocation;
use App\Repositories\SocietyLocation\SocietyLocationRepository;

/**
* SocietyLocationRepositoryModel class.
*
*/

class SocietyLocationRepositoryModel extends RepositoryModel implements SocietyLocationRepository 
{
    /**
     * @param Model $model
     *
     */
    public function __construct(SocietyLocation $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * 
     * @return Model
     */
    public function new(array $attributes = []): SocietyLocation
    {
        return new SocietyLocation($attributes);
    }
}