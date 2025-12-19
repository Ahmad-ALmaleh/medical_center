<?php

namespace App\Repositories\Eloquent;

use App\Models\Patient;
use App\Repositories\Contracts\PatientRepositoryInterface;

class PatientRepository extends BaseRepository implements PatientRepositoryInterface
{
    public function __construct(Patient $patient)
    {
        $this->model = $patient;
    }

    public function findByMedicalNumber(string $medicalNumber)
    {
        return $this->model
            ->where('medical_number', $medicalNumber)
            ->with('user')
            ->first();
    }
}

