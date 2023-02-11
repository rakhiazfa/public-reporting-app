<?php

namespace App\Services\User;

use App\Foundation\Service\ServiceInterface;

interface UserService extends ServiceInterface
{
    /**
     * @param array $credentials
     * 
     * @return mixed
     */
    public function login(array $credentials): mixed;
}
