<?php

namespace App\Services\Employee;

use App\Models\Employee;
use Rakhiazfa\LaravelSarp\Repository\RepositoryModel;
use Rakhiazfa\LaravelSarp\Service\ServiceImplementation;
use App\Services\Employee\EmployeeService;
use App\Repositories\Employee\EmployeeRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Rakhiazfa\LaravelSarp\Repository\RepositoryInterface;

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
     * @var EmployeeRepository
     */
    protected RepositoryInterface $repository;

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
     * Get employees by agency.
     * 
     * @param int|string $agencyId
     * 
     * @return Collection
     */
    public function getByAgency(int|string $agencyId): Collection
    {
        return $agencyId === 'admin' ? $this->orderByIdDesc() : $this->repository->getByAgency($agencyId);
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

    /**
     * @param Employee $employee
     * @param array $attributes
     * 
     * @return bool
     */
    public function updateEmployee(Employee $employee, array $attributes = []): bool
    {
        return $employee->update($attributes) &&
            $employee->user->update($attributes);
    }
}
