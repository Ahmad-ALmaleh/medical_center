<?php

namespace App\Repositories\Eloquent;

use App\Models\Clinic;
use App\Repositories\Contracts\ClinicRepositoryInterface;

class ClinicRepository extends BaseRepository implements ClinicRepositoryInterface
{
    public function __construct(Clinic $clinic)
    {
        $this->model = $clinic;
    }

    public function getActiveClinics()
    {
        return $this->model->where('status', 'active')->get();
    }
}
