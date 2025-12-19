<?php

namespace App\Repositories\Contracts;

interface InvoiceRepositoryInterface extends BaseRepositoryInterface
{

    public function getByPatient(int $patientId);
    public function getByClinic(int $clinicId);

}
