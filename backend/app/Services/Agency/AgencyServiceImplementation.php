<?php

namespace App\Services\Agency;

use App\Models\Agency;
use Rakhiazfa\LaravelSarp\Repository\RepositoryModel;
use Rakhiazfa\LaravelSarp\Service\ServiceImplementation;
use App\Services\Agency\AgencyService;
use App\Repositories\Agency\AgencyRepository;
use App\Repositories\AgencyLocation\AgencyLocationRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * AgencyServiceImplementation class.
 *
 */

class AgencyServiceImplementation extends ServiceImplementation implements AgencyService
{
    /**
     * @var UserRepository
     */
    protected UserRepository $userRepository;

    /**
     * @var AgencyLocationRepository
     */
    protected AgencyLocationRepository $agencyLocationRepository;

    /**
     * @param RepositoryModel $repository
     *
     */
    public function __construct(
        AgencyRepository $repository,
        UserRepository $userRepository,
        AgencyLocationRepository $agencyLocationRepository
    ) {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->agencyLocationRepository = $agencyLocationRepository;
    }

    /**
     * Create a new agency.
     * 
     * @param array $user
     * @param array $agency
     * @param array $location
     * 
     * @return Model
     */
    public function createAgency(array $attributes = []): Model
    {
        $attributes['role_id'] = 2;

        $user = $this->userRepository->create($attributes);

        $agency = $this->repository->new($attributes);
        $agency->user()->associate($user);
        $agency->save();

        $location = $this->agencyLocationRepository->new($attributes);
        $location->agency()->associate($agency);
        $location->save();

        return $agency;
    }

    /**
     * Update agency by id.
     * 
     * @param Agency $agency
     * @param array $attributes
     * 
     * @return bool
     */
    public function updateAgency(Agency $agency, array $attributes = []): bool
    {
        return $agency->update($attributes) &&
            $agency->user->update($attributes) &&
            $agency->location->update($attributes);
    }
}
