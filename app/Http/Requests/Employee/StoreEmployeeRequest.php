<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            /*
            |--------------------------------------------------------------------------
            | User Data
            |--------------------------------------------------------------------------
            */
            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'email', 'max:255', 'unique:users,email'],

            'password' => ['required', 'string', 'min:8'],

            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'gender' => ['nullable', Rule::in(['male', 'female'])],
            'birth_date' => ['nullable', 'date'],

            /*
            |--------------------------------------------------------------------------
            | Employee Data
            |--------------------------------------------------------------------------
            */
            'clinic_id' => ['required', 'exists:clinics,id'],

            'job_title' => ['required', 'string', 'max:255'],

            'salary' => ['nullable', 'numeric', 'min:0'],

            'status' => [
                'required',
                Rule::in(['active', 'inactive']),
            ],
        ];
    }
}
