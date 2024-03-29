<?php

namespace Cms\User\Controllers;

use Cms\Base\controller\BaseController;
use Cms\User\UserRepository;
use Cms\User\Validators\StoreUserValidator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends BaseController
{
    public function __construct(UserRepository $userRepository)
    {
        parent::__construct($userRepository);
    }

    public function store(Request $request): JsonResponse
    {
        StoreUserValidator::validate($request);
        return parent::store($request);
    }
}
