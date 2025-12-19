<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'date'      => $this->appointment_date,
            'status'    => $this->status,
            'doctor'    => new DoctorResource($this->whenLoaded('doctor')),
            'patient'   => new PatientResource($this->whenLoaded('patient')),
        ];
    }
}

