<?php

namespace App\Http\Controllers\CompanyAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest\LoginRequest;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $company = Company::where('email', $validated['email'])->first();

        if (! $company || ! Hash::check($validated['password'], $company->password)) {
            return response()->json([
                'message' => 'The provided credentials are incorrect.',
            ], 401);
        }

        $token = $company->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful.',
            'company' => $company,
            'token' => $token,
        ], 200);
    }
}