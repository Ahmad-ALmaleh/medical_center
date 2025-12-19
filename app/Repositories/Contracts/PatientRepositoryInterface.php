<?php

namespace App\Repositories\Contracts;

interface PatientRepositoryInterface extends BaseRepositoryInterface
{
    public function findByMedicalNumber(string $medicalNumber);
}
