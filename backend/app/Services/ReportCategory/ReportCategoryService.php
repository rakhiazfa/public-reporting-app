<?php

namespace App\Services\ReportCategory;

use App\Foundation\Service\ServiceInterface;
use App\Models\ReportCategory;
use Illuminate\Database\Eloquent\Model;

interface ReportCategoryService extends ServiceInterface
{
    /**
     * Create a new subcategory.
     * 
     * @param ReportCategory $reportCategory
     * @param array $attributes
     * 
     * @return Model
     */
    public function createSubcategory(ReportCategory $reportCategory, array $attributes = []): Model;
}
