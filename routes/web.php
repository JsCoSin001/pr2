<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function () {
    Route::middleware('guest')->post('login',LoginController::class);
    Route::middleware('auth')->post('logout',LogoutController::class);
    Route::middleware('guest')->post('register',RegisterController::class);
});

Route::get('user',function (Request $request) {
    return $request->user();
})->middleware('auth');