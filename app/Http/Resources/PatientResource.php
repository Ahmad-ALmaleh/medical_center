<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'birth_date'  => $this->birth_date,
            'gender'      => $this->gender,
            'user'        => new UserResource($this->whenLoaded('user')),
        ];
    }
}

