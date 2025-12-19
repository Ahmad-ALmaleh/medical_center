<?php

namespace App\Repositories\Eloquent;

use App\Models\Appointment;
use App\Repositories\Contracts\AppointmentRepositoryInterface;
use Carbon\Carbon;

class AppointmentRepository extends BaseRepository implements AppointmentRepositoryInterface
{
    public function __construct(Appointment $appointment)
    {
        $this->model = $appointment;
    }

    public function getByDoctor(int $doctorId)
    {
        return $this->model
            ->where('doctor_id', $doctorId)
            ->with(['patient.user', 'clinic'])
            ->get();
    }

    public function getByPatient(int $patientId)
    {
        return $this->model
            ->where('patient_id', $patientId)
            ->with(['doctor.user', 'clinic'])
            ->get();
    }

    public function getByClinic(int $clinicId)
    {
        return $this->model
            ->where('clinic_id', $clinicId)
            ->with(['doctor.user', 'patient.user'])
            ->get();
    }

    public function getUpcoming()
    {
        return $this->model
            ->whereDate('appointment_date', '>=', Carbon::today())
            ->with(['doctor.user', 'patient.user', 'clinic'])
            ->orderBy('appointment_date')
            ->get();
    }
}
