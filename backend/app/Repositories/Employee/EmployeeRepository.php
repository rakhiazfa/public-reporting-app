<?php

namespace App\Repositories\Employee;

use Illuminate\Database\Eloquent\Collection;
use Rakhiazfa\LaravelSarp\Repository\RepositoryInterface;

/**
 * EmployeeRepository interface.
 *
 */

interface EmployeeRepository extends RepositoryInterface
{
    /**
     * Get employees by agency.
     * 
     * @param int $agencyId
     * 
     * @return Collection
     */
    public function getByAgency(int $agencyId): Collection;
}
