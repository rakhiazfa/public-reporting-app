<?php

namespace App\Services\ReportCategory;

use App\Repositories\ReportCategory\ReportCategoryRepository;

class ReportCategoryServiceImplementation implements ReportCategoryService
{
    /**
     * @var ReportCategoryRepository
     */
    protected ReportCategoryRepository $reportCategoryRepository;

    /**
     * @param ReportCategoryRepository $reportCategoryRepository
     */
    public function __construct(ReportCategoryRepository $reportCategoryRepository)
    {
        $this->reportCategoryRepository = $reportCategoryRepository;
    }
}
