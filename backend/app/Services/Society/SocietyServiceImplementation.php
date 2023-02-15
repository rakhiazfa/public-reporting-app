<?php

namespace App\Services\Society;

use Rakhiazfa\LaravelSarp\Repository\RepositoryModel;
use Rakhiazfa\LaravelSarp\Service\ServiceImplementation;
use App\Services\Society\SocietyService;
use App\Repositories\Society\SocietyRepository;
use App\Repositories\SocietyLocation\SocietyLocationRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * SocietyServiceImplementation class.
 *
 */

class SocietyServiceImplementation extends ServiceImplementation implements SocietyService
{
    /**
     * @var UserRepository
     */
    protected UserRepository $userRepository;

    /**
     * @var SocietyLocationRepository
     */
    protected SocietyLocationRepository $societyLocationRepository;

    /**
     * @param RepositoryModel $repository
     *
     */
    public function __construct(
        SocietyRepository $repository,
        UserRepository $userRepository,
        SocietyLocationRepository $societyLocationRepository
    ) {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->societyLocationRepository = $societyLocationRepository;
    }

    public function createSociety(array $attributes = []): Model
    {
        $attributes['role_id'] = 4;
        $user = $this->userRepository->create($attributes);

        $society = $this->repository->new($attributes);
        $society->user()->associate($user);
        $society->save();

        $location = $this->societyLocationRepository->new($attributes);
        $location->society()->associate($society);
        $location->save();

        return $society;
    }
}
