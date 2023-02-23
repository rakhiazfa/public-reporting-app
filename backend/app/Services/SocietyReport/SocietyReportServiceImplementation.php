<?php

namespace App\Services\SocietyReport;

use App\Models\Society;
use App\Models\SocietyReport;
use App\Repositories\Society\SocietyRepository;
use Rakhiazfa\LaravelSarp\Service\ServiceImplementation;
use App\Services\SocietyReport\SocietyReportService;
use App\Repositories\SocietyReport\SocietyReportRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * SocietyReportServiceImplementation class.
 *
 */

class SocietyReportServiceImplementation extends ServiceImplementation implements SocietyReportService
{
    /**
     * @var SocietyRepository
     */
    protected SocietyRepository $societyRepository;

    /**
     * @param SocietyReportRepository $repository
     *
     */
    public function __construct(SocietyReportRepository $repository, SocietyRepository $societyRepository)
    {
        $this->repository = $repository;
        $this->societyRepository = $societyRepository;
    }

    /**
     * Create society report.
     * 
     * @param Society $society
     * @param array $attributes
     * 
     * @return Model
     */
    public function createReport(Society $society, array $attributes): Model
    {
        $attributes['ticket_id'] = SocietyReport::generateTicketId();
        $code = str_replace('#', '', $attributes['ticket_id']);
        $attributes['slug'] = Str::slug($attributes['title']) . '-' . $code;

        $societyReport = $this->repository->new($attributes);
        $societyReport->author()->associate($society);
        $societyReport->save();

        return $societyReport;
    }
}
