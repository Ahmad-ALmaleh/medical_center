<?php

namespace App\Repositories\Eloquent;

use App\Models\Doctor;
use App\Repositories\Contracts\DoctorRepositoryInterface;

class DoctorRepository extends BaseRepository implements DoctorRepositoryInterface
{
    public function __construct(Doctor $doctor)
    {
        $this->model = $doctor;
    }

    public function getByClinic(int $clinicId)
    {
        return $this->model
            ->where('clinic_id', $clinicId)
            ->where('status', 'active')
            ->with('user')
            ->get();
    }

    public function getActiveDoctors()
    {
        return $this->model
            ->where('status', 'active')
            ->with(['user', 'clinic'])
            ->get();
    }
}
