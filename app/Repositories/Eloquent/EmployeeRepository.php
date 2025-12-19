<?php

namespace App\Repositories\Eloquent;

use App\Models\Employee;
use App\Repositories\Contracts\EmployeeRepositoryInterface;

class EmployeeRepository extends BaseRepository implements EmployeeRepositoryInterface
{
    public function __construct(Employee $employee)
    {
        $this->model = $employee;
    }

    public function getActiveEmployees()
    {
        return $this->model->where('is_active', true)->with('user')->get();
    }
}
