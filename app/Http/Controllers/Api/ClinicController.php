<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function __construct(
        private \App\Repositories\Contracts\ClinicRepositoryInterface $clinics
    ) {}

    public function index()
    {
        return \App\Http\Resources\ClinicResource::collection(
            $this->clinics->all()
        );
    }

    public function store(
        \App\Http\Requests\Clinic\StoreClinicRequest $request
    ) {
        $clinic = $this->clinics->create($request->validated());

        return new \App\Http\Resources\ClinicResource($clinic);
    }
}

