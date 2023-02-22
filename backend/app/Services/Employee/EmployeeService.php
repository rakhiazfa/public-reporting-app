<?php

namespace App\Services\Employee;

use App\Models\Employee;
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
     * @param int $agencyId
     * 
     * @return Collection
     */
    public function getByAgency(int $agencyId): Collection;

    /**
     * Create a new employee.
     * 
     * @param array $attributes
     * 
     * @return Model
     */
    public function createEmployee(array $attributes): Model;

    /**
     * @param Employee $employee
     * @param array $attributes
     * 
     * @return bool
     */
    public function updateEmployee(Employee $employee, array $attributes = []): bool;

    /**
     * @param Employee $employee
     * 
     * @return bool
     */
    public function deleteEmployee(Employee $employee): bool;
}
