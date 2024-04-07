<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
   
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'branch_id' => $this->branch_id,
            'employee_id' => $this->employee_id,
            'appointment_date' => $this->appointment_id,
            'notes' => $this->notes,
            'status' => $this->status,
            'orders' => $this->orders,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
