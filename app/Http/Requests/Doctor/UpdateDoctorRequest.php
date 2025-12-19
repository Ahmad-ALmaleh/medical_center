<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDoctorRequest extends FormRequest
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
            | User Data (optional on update)
            |--------------------------------------------------------------------------
            */
            'name' => ['sometimes', 'string', 'max:255'],

            'email' => [
                'sometimes',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore(
                    $this->route('doctor')->user_id ?? null
                ),
            ],

            'password' => ['sometimes', 'string', 'min:8'],

            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'gender' => ['nullable', Rule::in(['male', 'female'])],
            'birth_date' => ['nullable', 'date'],

            /*
            |--------------------------------------------------------------------------
            | Doctor Data
            |--------------------------------------------------------------------------
            */
            'clinic_id' => ['sometimes', 'exists:clinics,id'],

            'specialization' => ['sometimes', 'string', 'max:255'],

            'license_number' => ['sometimes', 'string', 'max:100'],

            'status' => [
                'sometimes',
                Rule::in(['active', 'inactive']),
            ],
        ];
    }
}
    