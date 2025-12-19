<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function __construct(
        private \App\Repositories\Contracts\AppointmentRepositoryInterface $appointments
    ) {}

    public function store(
        \App\Http\Requests\Appointment\StoreAppointmentRequest $request
    ) {
        $appointment = $this->appointments->create($request->validated());

        return new \App\Http\Resources\AppointmentResource($appointment);
    }
}

