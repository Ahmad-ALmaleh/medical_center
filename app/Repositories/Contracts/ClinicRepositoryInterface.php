<?php

namespace App\Repositories\Contracts;

interface ClinicRepositoryInterface extends BaseRepositoryInterface
{
    public function getActiveClinics();
}
