<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'       => ['required', 'string', 'max:255'],
            'email'      => ['required', 'email', 'unique:users,email'],
            'password'   => ['required', 'string', 'min:8'],
            'role'       => ['required', Rule::in(['admin', 'doctor', 'employee', 'patient'])],
            'birth_date' => ['nullable', 'date'],
            'gender'     => ['nullable', Rule::in(['male', 'female'])],
            'phone'      => ['nullable', 'string'],
            'address'    => ['nullable', 'string'],

            /* بيانات الدور */
            'role_data'              => ['array'],
            'role_data.clinic_id'    => ['required_if:role,doctor', 'exists:clinics,id'],
            'role_data.specialty'    => ['required_if:role,doctor', 'string'],
            'role_data.license_number' => ['required_if:role,doctor', 'string'],

            'role_data.job_title'    => ['required_if:role,employee', 'string'],
            'role_data.salary'       => ['required_if:role,employee', 'numeric'],
            'role_data.hired_at'     => ['required_if:role,employee', 'date'],

            'role_data.medical_number' => ['required_if:role,patient', 'string'],
        ];
    }
}
