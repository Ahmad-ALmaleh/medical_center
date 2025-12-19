<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreInvoiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'appointment_id' => ['required', 'exists:appointments,id'],
            'patient_id'     => ['required', 'exists:patients,id'],
            'clinic_id'      => ['required', 'exists:clinics,id'],
            'amount'         => ['required', 'numeric', 'min:0'],
            'payment_status' => ['required', Rule::in(['pending', 'paid', 'failed'])],

            'payment_method' => ['required', Rule::in(['cash', 'card', 'insurance'])],

            'issued_by' => ['required', 'exists:employees,id'],
        ];
    }
}
