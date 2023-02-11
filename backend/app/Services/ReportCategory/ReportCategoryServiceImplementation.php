<?php

namespace App\Services\ReportCategory;

use App\Foundation\Service\ServiceImplementation;
use App\Repositories\ReportCategory\ReportCategoryRepository;

class ReportCategoryServiceImplementation extends ServiceImplementation implements ReportCategoryService
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
