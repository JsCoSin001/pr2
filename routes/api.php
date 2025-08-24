<?php

use App\Http\Controllers\Api\V1\TaskCompletedController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('tasks', App\Http\Controllers\Api\V1\TaskController::class);
    Route::patch('tasks/{task}/completed', [TaskCompletedController::class, '__invoke']);
});