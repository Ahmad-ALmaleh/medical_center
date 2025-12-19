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

    public function getUnpaid()
    {
        return $this->model
            ->where('payment_status', 'unpaid')
            ->with(['patient.user', 'clinic'])
            ->get();
    }

    public function getByPatient(int $patientId)
    {
        return $this->model
            ->where('patient_id', $patientId)
            ->with(['appointment', 'clinic'])
            ->get();
    }
}
