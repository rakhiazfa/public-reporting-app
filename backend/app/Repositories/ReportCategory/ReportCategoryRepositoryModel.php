<?php

namespace App\Repositories\ReportCategory;

use Rakhiazfa\LaravelSarp\Repository\RepositoryModel;
use App\Models\ReportCategory;
use Illuminate\Database\Eloquent\Model;

class ReportCategoryRepositoryModel extends RepositoryModel implements ReportCategoryRepository
{
    /**
     * @var Model
     */
    protected Model $model;

    /**
     * @param ReportCategory $model
     */
    public function __construct(ReportCategory $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * 
     * @return ReportCategory
     */
    public function new(array $attributes = []): ReportCategory
    {
        return new ReportCategory($attributes);
    }
}
