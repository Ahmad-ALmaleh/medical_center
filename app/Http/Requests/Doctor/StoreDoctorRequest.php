<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDoctorRequest extends FormRequest
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

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email'),
            ],

            'password' => ['required', 'string', 'min:8'],

            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'gender' => ['nullable', Rule::in(['male', 'female'])],
            'birth_date' => ['nullable', 'date'],

            /*
            |--------------------------------------------------------------------------
            | Doctor Data
            |--------------------------------------------------------------------------
            */
            'clinic_id' => ['required', 'exists:clinics,id'],

            'specialization' => ['required', 'string', 'max:255'],

            'license_number' => ['required', 'string', 'max:100'],

            'status' => [
                'required',
                Rule::in(['active', 'inactive']),
            ],
        ];
    }
}
