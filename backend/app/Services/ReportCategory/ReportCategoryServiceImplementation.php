<?php

namespace App\Services\ReportCategory;

use App\Foundation\Service\ServiceImplementation;
use App\Models\ReportCategory;
use App\Models\ReportSubcategory;
use App\Repositories\ReportCategory\ReportCategoryRepository;
use App\Repositories\ReportSubcategory\ReportSubcategoryRepository;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReportCategoryServiceImplementation extends ServiceImplementation implements ReportCategoryService
{
    /**
     * @var ReportSubcategoryRepository
     */
    protected ReportSubcategoryRepository $reportSubcategoryRepository;

    /**
     * @param ReportCategoryRepository $repository
     */
    public function __construct(
        ReportCategoryRepository $repository,
        ReportSubcategoryRepository $reportSubcategoryRepository
    ) {
        $this->repository = $repository;
        $this->reportSubcategoryRepository = $reportSubcategoryRepository;
    }

    /**
     * Create a new report subcategory.
     * 
     * @param ReportCategory $reportCategory
     * @param array $attributes
     * 
     * @return Model
     */
    public function createSubcategory(ReportCategory $reportCategory, array $attributes = []): Model
    {
        $subcategory = $this->reportSubcategoryRepository->new($attributes);

        $subcategory->reportCategory()->associate($reportCategory);

        $subcategory->save();

        return $subcategory;
    }

    public function deleteSubcategory(ReportCategory $reportCategory, int $id): bool
    {
        if (!$reportCategory->reportSubcategories->contains($id)) {

            throw new NotFoundHttpException('Not found', null, 404);
        }

        $reportSubcategory = ReportSubcategory::find($id);

        return $reportSubcategory->delete();
    }
}
