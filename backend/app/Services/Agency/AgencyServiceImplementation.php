<?php

namespace App\Services\Agency;

use Rakhiazfa\LaravelSarp\Repository\RepositoryModel;
use Rakhiazfa\LaravelSarp\Service\ServiceImplementation;
use App\Services\Agency\AgencyService;
use App\Repositories\Agency\AgencyRepository;

/**
* AgencyServiceImplementation class.
*
*/

class AgencyServiceImplementation extends ServiceImplementation implements AgencyService
{
    /**
     * @param RepositoryModel $repository
     *
     */
    public function __construct(AgencyRepository $repository)
    {
        $this->repository = $repository;
    }
}