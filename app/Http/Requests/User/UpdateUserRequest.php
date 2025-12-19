<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:255'],

            'email' => [
                'sometimes',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->route('id')),
            ],

            'password' => ['sometimes', 'string', 'min:8'],

            'role' => [
                'sometimes',
                Rule::in(['admin', 'doctor', 'employee', 'patient']),
            ],

            'is_active' => ['sometimes', 'boolean'],

            'phone' => ['sometimes', 'string', 'max:20'],
            'address' => ['sometimes', 'string', 'max:255'],
            'gender' => ['sometimes', Rule::in(['male', 'female'])],
            'birth_date' => ['sometimes', 'date'],
        ];
    }
}
