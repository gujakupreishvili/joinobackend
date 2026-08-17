<?php

namespace App\Http\Controllers\CompanyAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest\RegisterCompanyRequest;
use App\Http\Resources\CompanyResource\RegisterResource;
use App\Models\Company;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    public function register(RegisterCompanyRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars/companies', 'public');
        } else {
            $data['avatar'] = null;
        }

        $company = Company::create($data);

        return response()->json([
            'status' => 'success',
            'message' => __('Company registered successfully'),
            'company' => new RegisterResource($company),
        ], 201);
    }
}