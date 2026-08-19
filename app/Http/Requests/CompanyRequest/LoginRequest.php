<?php

namespace App\Http\Requests\CompanyRequest;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'       => 'required|string',
            'password'    => 'required',
            'remember_me' => 'nullable|boolean',
        ];
    }
    public function messages(): array
    {
        return [
            'email.required'    =>  'login is required',
            'password.required' => " password is required",
        ];
    }
}
