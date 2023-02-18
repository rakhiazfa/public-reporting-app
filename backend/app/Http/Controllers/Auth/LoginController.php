<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\ExceptionResponse;
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

            $response = $this->userService->login(
                $request->only(['email_or_username', 'password']),
                $request->expectsJson(),
            );

            // 
        } catch (\Exception $exception) {

            return $request->expectsJson() ?
                (new ExceptionResponse($exception))->json()
                : back()->withErrors([
                    'email_or_username' => 'The provided credentials do not match our records.',
                ])->onlyInput('email_or_username');
        }

        !$request->expectsJson() && $request->session()->regenerate();

        return $request->expectsJson() ? response()->json($response, 200) : redirect()->intended();
    }
}
