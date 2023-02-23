<?php

namespace App\Services\SocietyReport;

use Rakhiazfa\LaravelSarp\Repository\RepositoryModel;
use Rakhiazfa\LaravelSarp\Service\ServiceImplementation;
use App\Services\SocietyReport\SocietyReportService;
use App\Repositories\SocietyReport\SocietyReportRepository;

/**
* SocietyReportServiceImplementation class.
*
*/

class SocietyReportServiceImplementation extends ServiceImplementation implements SocietyReportService
{
    /**
     * @param RepositoryModel $repository
     *
     */
    public function __construct(SocietyReportRepository $repository)
    {
        $this->repository = $repository;
    }
}