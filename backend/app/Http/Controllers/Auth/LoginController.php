<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\User\UserService;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

class LoginController extends Controller
{
    /**
     * @var UserService
     */
    protected UserService $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param LoginRequest $request
     * 
     * @return Response
     */
    public function __invoke(LoginRequest $request)
    {
        try {

            $response = $this->userService->login($request->only(['email_or_username', 'password']));

            // 
        } catch (\Exception $exception) {

            return response()->json([
                'success' => false,
                'code' => $exception->getCode(),
                'message' => $exception->getMessage(),
            ], $exception->getCode());
        }

        return response()->json($response, 200);
    }
}
