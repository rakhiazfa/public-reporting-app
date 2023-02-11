<?php

namespace App\Services\ReportCategory;

use App\Foundation\Service\ServiceImplementation;
use App\Repositories\ReportCategory\ReportCategoryRepository;

class ReportCategoryServiceImplementation extends ServiceImplementation implements ReportCategoryService
{
    /**
     * @param ReportCategoryRepository $repository
     */
    public function __construct(ReportCategoryRepository $repository)
    {
        $this->repository = $repository;
    }
}
