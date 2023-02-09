<?php

namespace App\Services\User;

use App\Repositories\User\UserRepository;

class UserServiceImplementation implements UserService
{
    /**
     * @var UserRepository
     */
    protected UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
}
