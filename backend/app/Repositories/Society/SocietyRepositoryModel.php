<?php

namespace App\Repositories\Society;

use Rakhiazfa\LaravelSarp\Repository\RepositoryModel;
use Illuminate\Database\Eloquent\Model;
use App\Models\Society;
use App\Repositories\Society\SocietyRepository;

/**
* SocietyRepositoryModel class.
*
*/

class SocietyRepositoryModel extends RepositoryModel implements SocietyRepository 
{
    /**
     * @param Model $model
     *
     */
    public function __construct(Society $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * 
     * @return Model
     */
    public function new(array $attributes = []): Society
    {
        return new Society($attributes);
    }
}