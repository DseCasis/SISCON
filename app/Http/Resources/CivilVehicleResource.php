<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CivilVehicleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this-> id,
            'vehicle_id' => $this->vehicle_id,
            'color' => $this->color,
            'observation' => $this->observation,
            'civil_personnel_id' => $this->civil_personnel_id,
            'location_id' => $this->location_id,
            'vehicle_brand_id' => $this->vehicle_brand_id,
            'vehicle_type_id' => $this->vehicle_type_id,
        ];
    }
}
