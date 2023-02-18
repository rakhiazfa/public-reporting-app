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
     * @return mixed
     */
    public function createSociety(array $attributes = []): mixed;

    /**
     * @param Society $society
     * @param array $attributes
     * 
     * @return bool
     */
    public function updateSociety(Society $society, array $attributes = []): bool;

    /**
     * @param Society $society
     * 
     * @return bool
     */
    public function deleteSociety(Society $society): bool;
}
