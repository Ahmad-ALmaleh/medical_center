<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct(
        private \App\Repositories\Contracts\EmployeeRepositoryInterface $employees
    ) {}

    public function index()
    {
        return \App\Http\Resources\EmployeeResource::collection(
            $this->employees->all()
        );
    }

    public function store(
        \App\Http\Requests\Employee\StoreEmployeeRequest $request
    ) {
        $employee = $this->employees->create($request->validated());

        return new \App\Http\Resources\EmployeeResource($employee);
    }
}

