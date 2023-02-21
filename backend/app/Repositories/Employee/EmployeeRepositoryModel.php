<?php

namespace App\Repositories\Employee;

use Rakhiazfa\LaravelSarp\Repository\RepositoryModel;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Repositories\Employee\EmployeeRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * EmployeeRepositoryModel class.
 *
 */

class EmployeeRepositoryModel extends RepositoryModel implements EmployeeRepository
{
    /**
     * @param Model $model
     *
     */
    public function __construct(Employee $model)
    {
        $this->model = $model;
    }

    /**
     * Get employees by agency.
     * 
     * @param int $agencyId
     * 
     * @return Collection
     */
    public function getByAgency(int $agencyId): Collection
    {
        return $this->model->where('agency_id', $agencyId)->get();
    }

    /**
     * @param array $attributes
     * 
     * @return Model
     */
    public function new(array $attributes = []): Employee
    {
        return new Employee($attributes);
    }
}
