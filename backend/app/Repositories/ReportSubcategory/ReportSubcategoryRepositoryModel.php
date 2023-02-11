<?php

namespace App\Repositories\ReportSubcategory;

use App\Foundation\Repository\RepositoryModel;
use App\Models\ReportSubcategory;
use Illuminate\Database\Eloquent\Model;

class ReportSubcategoryRepositoryModel extends RepositoryModel implements ReportSubcategoryRepository
{
    /**
     * @var Model
     */
    protected Model $model;

    /**
     * @param ReportSubcategory $model
     */
    public function __construct(ReportSubcategory $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * 
     * @return ReportSubcategory
     */
    public function new(array $attributes = []): ReportSubcategory
    {
        return new ReportSubcategory($attributes);
    }
}
