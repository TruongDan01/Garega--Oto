<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'zalo_id' => $this->zalo_id,
            'branch_id' => $this->branch_id,
            'employee_id' => $this->employee_id,
            'appointment_date' => $this->appointment_date,
            'status' => $this->status,
        ];
    }
}
