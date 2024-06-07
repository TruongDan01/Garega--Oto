<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'appointment_id' => $this->appointment_id,
            'product_id' => $this->product_id,
            'time_picker_id' => $this->time_picker_id,
            'customer_name' => $this->customer_name,
            'customer_email' => $this->customer_email,
            'customer_address' => $this->customer_address,
            'customer_phone' => $this->customer_phone,
            'customer_note' => $this->customer_note,
        ];
    }
}
