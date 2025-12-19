<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\StoreDoctorRequest;
use App\Http\Resources\DoctorResource;
use App\Repositories\Contracts\DoctorRepositoryInterface;

class DoctorController extends Controller
{
    public function __construct(
        private DoctorRepositoryInterface $doctors
    ) {}

    public function index()
    {
        return DoctorResource::collection(
            $this->doctors->all()
        );
    }

    public function store(StoreDoctorRequest $request)
    {
        $doctor = $this->doctors->create($request->validated());

        return new DoctorResource($doctor);
    }

    public function show(int $id)
    {
        return new DoctorResource(
            $this->doctors->find($id)
        );
    }
}
