<?php

namespace App\Services\Agency;

use App\Models\Agency;
use Illuminate\Database\Eloquent\Model;
use Rakhiazfa\LaravelSarp\Service\ServiceInterface;

/**
 * AgencyService interface.
 *
 */

interface AgencyService extends ServiceInterface
{
    /**
     * Create a new agency.
     * 
     * @param array $attributes
     * 
     * @return Model
     */
    public function createAgency(array $attributes = []): Model;

    /**
     * Update agency by id.
     * 
     * @param Agency $agency
     * @param array $attributes
     * 
     * @return bool
     */
    public function updateAgency(Agency $agency, array $attributes = []): bool;

    /**
     * Delete agency by id.
     * 
     * @param Agency $agency
     * 
     * @return bool
     */
    public function deleteAgency(Agency $agency): bool;
}
