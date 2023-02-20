<?php

namespace App\Repositories\Employee;

use Rakhiazfa\LaravelSarp\Repository\RepositoryModel;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Repositories\Employee\EmployeeRepository;

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
     * @param array $attributes
     * 
     * @return Model
     */
    public function new(array $attributes = []): Employee
    {
        return new Employee($attributes);
    }
}