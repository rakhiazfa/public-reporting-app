<?php

namespace App\Services\SocietyReport;

use App\Models\Society;
use Illuminate\Database\Eloquent\Model;
use Rakhiazfa\LaravelSarp\Service\ServiceInterface;

/**
 * SocietyReportService interface.
 *
 */

interface SocietyReportService extends ServiceInterface
{
    /**
     * Create society report.
     * 
     * @param Society $society
     * @param array $attributes
     * 
     * @return Model
     */
    public function createReport(Society $society, array $attributes): Model;
}
