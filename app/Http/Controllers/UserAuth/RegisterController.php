<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest\RegisterRequest;
use App\Http\Resources\UserResource\RegisterRequest as UserResourceRegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    public function register( RegisterRequest $request): JsonResponse
    {
        $data = $request->validated();

        $user = User::create($data);

        return response()->json([
			'status'  => 'success',
			'message' => __('User registered successfully'),
			'user'    => new UserResourceRegisterRequest ($user),
		], 201);

    }
}
