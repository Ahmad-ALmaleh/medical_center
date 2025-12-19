<?php

namespace App\Repositories\Contracts;

interface DoctorRepositoryInterface extends BaseRepositoryInterface
{
    public function getByClinic(int $clinicId);

    public function getActiveDoctors();
}
