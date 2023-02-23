<?php

namespace App\Repositories\SocietyReport;

use Rakhiazfa\LaravelSarp\Repository\RepositoryModel;
use Illuminate\Database\Eloquent\Model;
use App\Models\SocietyReport;
use App\Repositories\SocietyReport\SocietyReportRepository;

/**
* SocietyReportRepositoryModel class.
*
*/

class SocietyReportRepositoryModel extends RepositoryModel implements SocietyReportRepository 
{
    /**
     * @param Model $model
     *
     */
    public function __construct(SocietyReport $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * 
     * @return Model
     */
    public function new(array $attributes = []): SocietyReport
    {
        return new SocietyReport($attributes);
    }
}