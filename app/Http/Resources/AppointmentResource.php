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
            'customer' => [
                'name' => $this->customer->name,
                'email' => $this->customer->email,
                'phone' => $this->customer->phone,
                'address' => $this->customer->address,
            ],
            'branch' => [
                'name' => $this->branch->name,
                'address' => $this->branch->address,
            ],
            'employee' => [
                'name' => $this->employee->name,
                'phone' => $this->employee->phone,
                'email' => $this->employee->email,
            ],
            'appointment_date' => $this->appointment_date,
            'notes' => $this->notes,
            'status' => $this->getStatusText(),
        ];
    }


    private function getStatusText(): string
    {
        switch ($this->status) {
            case 0:
                return 'Hủy bỏ';
            case 1:
                return 'Chờ xác nhận';
            case 2:
                return 'Đã xác nhận';
            case 3:
                return 'Hoàn thành';
            default:
                return 'Trạng thái không xác định';
        }
    }
}
