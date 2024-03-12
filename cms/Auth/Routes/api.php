<?php

use Illuminate\Support\Facades\Route;
use Cms\Auth\Controllers\AuthController;

Route::post('login', [AuthController::class, 'login']);
