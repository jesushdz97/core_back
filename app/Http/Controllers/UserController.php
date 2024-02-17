<?php

namespace App\Http\Controllers;

use App\Models\User;
use Cms\Base\BaseController;
use Cms\User\UserRepository;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
    }
}
