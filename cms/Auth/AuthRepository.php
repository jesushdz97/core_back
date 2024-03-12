<?php

namespace Cms\Auth;

use Cms\Auth\Abstraction\IAuthRepository;
use Cms\User\UserRepository;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AuthRepository implements IAuthRepository
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @throws \HttpException
     */
    public function generateToken(array $data)
    {
        $email    = data_get($data, 'email');
        $password = data_get($data, 'password');

        $user = $this->userRepository->findByAttributes(compact('email'));
        if ($user || Hash::check($password, data_get($user, 'password'))) {
            throw new HttpException(400, 'Some of the credentials are incorrect');
        }

        return $user->createToken('authToken')->plainTextToken;
    }

    public function purgeTokens(): void
    {

    }
}
