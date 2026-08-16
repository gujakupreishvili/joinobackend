<?php

use App\Http\Controllers\UserAuth\LoginController;
use App\Http\Controllers\UserAuth\LogOutController;
use App\Http\Controllers\UserAuth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('register/user', [RegisterController::class, 'register']);
Route::post('login/user', [LoginController::class, 'login']);
Route::post('logout/user', [LogOutController::class, 'logout'])->middleware('auth:sanctum');