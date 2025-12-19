<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $employeeId = $this->route('employee');

        return [
            /*
            |--------------------------------------------------------------------------
            | User Data
            |--------------------------------------------------------------------------
            */
            'name' => ['sometimes', 'string', 'max:255'],

            'email' => [
                'sometimes',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($employeeId, 'id'),
            ],

            'password' => ['sometimes', 'string', 'min:8'],

            'phone' => ['sometimes', 'nullable', 'string', 'max:20'],
            'address' => ['sometimes', 'nullable', 'string', 'max:255'],
            'gender' => ['sometimes', Rule::in(['male', 'female'])],
            'birth_date' => ['sometimes', 'date'],

            /*
            |--------------------------------------------------------------------------
            | Employee Data
            |--------------------------------------------------------------------------
            */
            'clinic_id' => ['sometimes', 'exists:clinics,id'],

            'job_title' => ['sometimes', 'string', 'max:255'],

            'salary' => ['sometimes', 'nullable', 'numeric', 'min:0'],

            'status' => [
                'sometimes',
                Rule::in(['active', 'inactive']),
            ],
        ];
    }
}
