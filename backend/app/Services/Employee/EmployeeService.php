<?php

namespace App\Services\Employee;

use Illuminate\Database\Eloquent\Model;
use Rakhiazfa\LaravelSarp\Service\ServiceInterface;

/**
 * EmployeeService interface.
 *
 */

interface EmployeeService extends ServiceInterface
{
    /**
     * Create a new employee.
     * 
     * @param array $attributes
     * 
     * @return Model
     */
    public function createEmployee(array $attributes): Model;
}
