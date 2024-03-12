<?php

namespace Cms\Auth\Controllers;

use App\Http\Controllers\Controller;
use Cms\Auth\AuthRepository;
use Cms\Auth\Validators\AuthLoginValidator;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponseHelpers;
    private AuthRepository $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * @throws \HttpException
     */
    public function login(Request $request)
    {
        AuthLoginValidator::validate($request);
        $token = $this->authRepository->generateToken($request->all());
        return $this->respondWithSuccess($token);
    }

    public function logout()
    {

    }

    public function register()
    {

    }
}
