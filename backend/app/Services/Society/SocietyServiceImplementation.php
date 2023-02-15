<?php

namespace App\Services\Society;

use Rakhiazfa\LaravelSarp\Repository\RepositoryModel;
use Rakhiazfa\LaravelSarp\Service\ServiceImplementation;
use App\Services\Society\SocietyService;
use App\Repositories\Society\SocietyRepository;

/**
* SocietyServiceImplementation class.
*
*/

class SocietyServiceImplementation extends ServiceImplementation implements SocietyService
{
    /**
     * @param RepositoryModel $repository
     *
     */
    public function __construct(SocietyRepository $repository)
    {
        $this->repository = $repository;
    }
}