<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\V1\TaskCompletedController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('tasks', App\Http\Controllers\Api\V1\TaskController::class);
    Route::patch('tasks/{task}/completed', [TaskCompletedController::class, '__invoke']);
});

Route::prefix('auth')->group(function () {
    Route::middleware('guest:sanctum')->post('login',LoginController::class);
    Route::middleware('auth:sanctum')->post('logout',LogoutController::class);
    Route::middleware('guest:sanctum')->post('register',RegisterController::class);
});

route::middleware('auth:sanctum')->get('user',function (Request $request) {
    return $request->user();
});