<?php

namespace App\Http\Requests\UserRequest;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'     => 'required|string|min:3|max:15|regex:/^[a-z0-9]+$/',
            'email'    => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:15',
            // 'avatar'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
           'name.required' => 'Name is required',
           'name.string' => 'Name must be a string',
           'name.min' => 'Name must be at least 3 characters',
           'name.max' => 'Name must not be greater than 15 characters',
           'name.regex' => 'Name must be alphanumeric and lowercase',
           'email.required' => 'Email is required',
           'email.email' => 'Email must be a valid email address',
           'email.max' => 'Email must not be greater than 255 characters',
           'email.unique' => 'Email has already been taken',
           'password.required' => 'Password is required',
           'password.string' => 'Password must be a string',
           'password.min' => 'Password must be at least 8 characters',
           'password.max' => 'Password must not be greater than 15 characters',

        ];

    }
}
