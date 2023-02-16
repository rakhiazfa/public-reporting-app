<?php

namespace App\Services\Society;

use App\Models\Society;
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

    /**
     * @param Society $society
     * @param array $attributes
     * 
     * @return bool
     */
    public function updateSociety(Society $society, array $attributes = []): bool;
}
