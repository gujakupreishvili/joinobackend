<?php

use App\Http\Controllers\UserAuth\RegisterController;
use Illuminate\Support\Facades\Route;

// Route::group(function () {
//     Route::post('register', [RegisterController::class, 'register']);

// });

Route::post('register/user', [RegisterController::class, 'register']);