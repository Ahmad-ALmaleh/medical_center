<?php

namespace App\Http\Requests\Clinic;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClinicRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $clinicId = $this->route('clinic');

        return [
            'name' => [
                'sometimes',
                'string',
                'max:255',
                Rule::unique('clinics', 'name')->ignore($clinicId),
            ],

            'description' => [
                'sometimes',
                'nullable',
                'string',
                'max:1000',
            ],

            'status' => [
                'sometimes',
                Rule::in(['active', 'inactive']),
            ],
        ];
    }
}
