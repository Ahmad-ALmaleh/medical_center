<?php

namespace App\Repositories\Contracts;

interface InvoiceRepositoryInterface extends BaseRepositoryInterface
{
    public function getUnpaid();

    public function getByPatient(int $patientId);
}
