<?php

namespace App\Http\Requests\CompanyRequest;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterCompanyRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email',
            'password' => 'required|string|min:8|max:15|confirmed',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'company_name.required' => 'Company name is required',
            'company_name.string' => 'Company name must be a string',
            'company_name.max' => 'Company name must not be greater than 255 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'email.unique' => 'Email has already been taken',
            'password.required' => 'Password is required',
            'password.string' => 'Password must be a string',
            'password.min' => 'Password must be at least 8 characters',
            'password.max' => 'Password must not be greater than 15 characters',
            'avatar.image' => 'Avatar must be an image',
            'avatar.mimes' => 'Avatar must be a file of type: jpg, jpeg, png, webp',
            'avatar.max' => 'Avatar must not be greater than 2MB',
        ];
    }
}
