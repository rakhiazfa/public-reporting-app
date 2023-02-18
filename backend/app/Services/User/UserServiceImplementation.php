<?php

namespace App\Services\User;

use App\Foundation\Service\ServiceImplementation;
use App\Repositories\User\UserRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

class UserServiceImplementation extends ServiceImplementation implements UserService
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

    /**
     * @param array $credentials
     * 
     * @return mixed
     */
    public function login(array $credentials, bool $expectsJson = true): mixed
    {
        $fieldType = filter_var($credentials['email_or_username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $fieldType => $credentials['email_or_username'],
            'password' => $credentials['password'],
        ];

        $token = $expectsJson ? Auth::attempt($credentials) : Auth::guard('web')->attempt($credentials);

        if (!$token) {

            throw new UnauthorizedException('The provided credentials do not match our records.', 401);
        }

        $user = $expectsJson ? Auth::user() : Auth::guard('web')->user();

        $user->load('role');

        return [
            'success' => true,
            'message' => 'Successfully logged in.',
            'code' => 200,
            'user' => $user,
            'token' => $token,
        ];
    }
}
