<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest\LoginRequest;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $rememberMe = $validated['remember_me'] ?? false;

        if (! Auth::attempt($request->only('email', 'password'), $rememberMe)) {
            return response()->json([
                'message' => 'The provided credentials are incorrect.',
            ], 401);
        }
        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful.',
            'user' => $user,
            'token' => $token,
        ], 200);

    }
}
