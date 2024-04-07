<?php

namespace App\Http\Resources;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

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
        'id' => $this->id,
        'appointment_id' => $this->appointment_id,
        'qr_code' => $this->qr_code,
        'status' => $this->status,
        'start_time' => Carbon::parse($this->start_time)->format('Y-m-d H:i'),
        'end_time' => Carbon::parse($this->end_time)->format('Y-m-d H:i'),
        'orders' => $this->orders,
    ];
}
}
