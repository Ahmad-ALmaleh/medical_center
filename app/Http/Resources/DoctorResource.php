<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'specialty' => $this->specialty,
            'clinic_id' => $this->clinic_id,
            'user'      => new UserResource($this->whenLoaded('user')),
        ];
    }
}
