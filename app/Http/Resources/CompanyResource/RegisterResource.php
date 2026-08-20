<?php

namespace App\Http\Resources\CompanyResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'company_name' => $this->company_name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'avatar' => $this->avatar ? asset('storage/' . $this->avatar) : null,
        ];
    }
}