<?php

namespace App\Services\User;

interface UserService
{
    /**
     * @param array $credentials
     * 
     * @return mixed
     */
    public function login(array $credentials): mixed;
}
