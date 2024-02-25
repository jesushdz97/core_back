<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('users', \Cms\User\Controller\UserController::class);
