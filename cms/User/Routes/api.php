<?php

use Illuminate\Support\Facades\Route;
use Cms\User\Controller\UserController;

Route::apiResource('users', UserController::class);
