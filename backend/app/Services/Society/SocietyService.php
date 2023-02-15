<?php

namespace App\Services\Society;

use Illuminate\Database\Eloquent\Model;
use Rakhiazfa\LaravelSarp\Service\ServiceInterface;

/**
 * SocietyService interface.
 *
 */

interface SocietyService extends ServiceInterface
{
    /**
     * @param array $attributes
     * 
     * @return Model
     */
    public function createSociety(array $attributes = []): Model;
}
