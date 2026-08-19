<?php

use App\Http\Controllers\CompanyAuth\LoginController as CompanyAuthLoginController;
use App\Http\Controllers\CompanyAuth\LogOutController as CompanyAuthLogOutController;
use App\Http\Controllers\CompanyAuth\RegisterController as CompanyAuthRegisterController;
use App\Http\Controllers\UserAuth\LoginController;
use App\Http\Controllers\UserAuth\LogOutController;
use App\Http\Controllers\UserAuth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('register/user', [RegisterController::class, 'register']);
Route::post('login/user', [LoginController::class, 'login']);
Route::post('logout/user', [LogOutController::class, 'logout'])->middleware('auth:sanctum');
Route::post('register/company', [CompanyAuthRegisterController::class, 'register']);
Route::post('login/company', [CompanyAuthLoginController::class, 'login']);
Route::post('logout/company', [CompanyAuthLogOutController::class, 'logout'])->middleware('auth:sanctum');