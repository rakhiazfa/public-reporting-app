<?php

namespace App\Services\Employee;

use Rakhiazfa\LaravelSarp\Repository\RepositoryModel;
use Rakhiazfa\LaravelSarp\Service\ServiceImplementation;
use App\Services\Employee\EmployeeService;
use App\Repositories\Employee\EmployeeRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * EmployeeServiceImplementation class.
 *
 */

class EmployeeServiceImplementation extends ServiceImplementation implements EmployeeService
{
    /**
     * @var UserRepository
     */
    protected UserRepository $userRepository;

    /**
     * @param RepositoryModel $repository
     *
     */
    public function __construct(EmployeeRepository $repository, UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
    }

    /**
     * Create a new employee.
     * 
     * @param array $attributes
     * 
     * @return Model
     */
    public function createEmployee(array $attributes): Model
    {
        $attributes['role_id'] = 3;

        $user = $this->userRepository->create($attributes);

        $employee = $this->repository->new($attributes);
        $employee->user()->associate($user);
        $employee->agency()->associate($attributes['agency_id']);
        $employee->save();

        return $employee;
    }
}
