<?php

namespace App\Repositories\Contracts;

interface AppointmentRepositoryInterface extends BaseRepositoryInterface
{
    public function getByDoctor(int $doctorId);

    public function getByPatient(int $patientId);

    public function getByClinic(int $clinicId);

    public function getUpcoming();
}
