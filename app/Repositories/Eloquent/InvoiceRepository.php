<?php

namespace App\Repositories\Eloquent;

use App\Models\Invoice;
use App\Repositories\Contracts\InvoiceRepositoryInterface;

class InvoiceRepository extends BaseRepository implements InvoiceRepositoryInterface
{
    public function __construct(Invoice $invoice)
    {
        $this->model = $invoice;
    }



    public function getByPatient(int $patientId)
    {
        return $this->model
            ->where('patient_id', $patientId)
            ->with(['appointment', 'clinic'])
            ->get();
    }

    public function getByClinic(int $clinicId)
    {
        return $this->model->where('clinic_id', $clinicId)
            ->with(['patient.user', 'clinic'])
            ->get();
    }
}
