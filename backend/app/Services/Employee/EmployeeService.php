<?php

namespace App\Services\Employee;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Rakhiazfa\LaravelSarp\Service\ServiceInterface;

/**
 * EmployeeService interface.
 *
 */

interface EmployeeService extends ServiceInterface
{
    /**
     * Get employees by agency.
     * 
     * @param int|string $agencyId
     * 
     * @return Collection
     */
    public function getByAgency(int|string $agencyId): Collection;

    /**
     * Create a new employee.
     * 
     * @param array $attributes
     * 
     * @return Model
     */
    public function createEmployee(array $attributes): Model;
}
