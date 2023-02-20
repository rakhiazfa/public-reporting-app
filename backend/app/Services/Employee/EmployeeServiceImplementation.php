<?php

namespace App\Services\Employee;

use Rakhiazfa\LaravelSarp\Repository\RepositoryModel;
use Rakhiazfa\LaravelSarp\Service\ServiceImplementation;
use App\Services\Employee\EmployeeService;
use App\Repositories\Employee\EmployeeRepository;

/**
* EmployeeServiceImplementation class.
*
*/

class EmployeeServiceImplementation extends ServiceImplementation implements EmployeeService
{
    /**
     * @param RepositoryModel $repository
     *
     */
    public function __construct(EmployeeRepository $repository)
    {
        $this->repository = $repository;
    }
}