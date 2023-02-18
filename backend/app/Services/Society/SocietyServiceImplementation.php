<?php

namespace App\Services\Society;

use App\Models\Society;
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

    /**
     * Create a new society.
     * 
     * @param array $attributes
     * 
     * @return Model
     */
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

    /**
     * Update society by id.
     * 
     * @param Society $society
     * @param array $attributes
     * 
     * @return bool
     */
    public function updateSociety(Society $society, array $attributes = []): bool
    {
        return $society->update($attributes) &&
            $society->user->update($attributes) &&
            $society->location->update($attributes);
    }

    /**
     * Delete user by id.
     * 
     * @param Society $society
     * 
     * @return bool
     */
    public function deleteSociety(Society $society): bool
    {
        return $society->user->delete();
    }
}
