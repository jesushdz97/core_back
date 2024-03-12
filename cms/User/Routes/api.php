<?php

use Illuminate\Support\Facades\Route;
use Cms\User\Controllers\UserController;

Route::middleware('auth:sanctum')->apiResource('users', UserController::class);
