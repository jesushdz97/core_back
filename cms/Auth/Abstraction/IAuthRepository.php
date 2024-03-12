<?php

namespace Cms\Auth\Abstraction;

use Illuminate\Http\JsonResponse;

interface IAuthRepository
{
    public function generateToken(array $data);

    public function purgeTokens(): void;
}
