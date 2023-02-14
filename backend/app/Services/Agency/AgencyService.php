<?php

namespace App\Services\Agency;

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
     * @param array $user
     * @param array $agency
     * @param array $location
     * 
     * @return Model
     */
    public function createAgency(array $attributes = []): Model;
}
