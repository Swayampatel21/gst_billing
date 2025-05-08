<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthApiController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::apiResource('users', UserController::class);

    Route::post('register', [AuthApiController::class, 'register']);
    Route::post('login', [AuthApiController::class, 'login']);
    Route::middleware('auth:sanctum')->post('logout', [AuthApiController::class, 'logout']);
});
