<?php

namespace App\Services\Agency;

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
    public function createAgency(array $user = [], array $agency = [], array $location): Model
    {
        $user = $this->userRepository->create($user);

        $agency = $this->repository->new($agency);
        $agency->user()->associate($user);
        $agency->save();

        $location = $this->agencyLocationRepository->new($location);
        $location->agency()->associate($agency);
        $location->save();

        return $agency;
    }
}
