<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function __construct(
        private \App\Repositories\Contracts\PatientRepositoryInterface $patients
    ) {}

    public function index()
    {
        return \App\Http\Resources\PatientResource::collection(
            $this->patients->all()
        );
    }

   /* public function store(
        \App\Http\Requests\Patient\StorePatientRequest $request
    ) {
        $patient = $this->patients->create($request->validated());

        return new \App\Http\Resources\PatientResource($patient);
    }*/
}

