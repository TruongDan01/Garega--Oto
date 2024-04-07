<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address
        ];
    }

    public function toCustomArrayWithEmployees($request)
    {
        return [
            'branch' => [
                'name' => $this->name,
                'address' => $this->address,
            ],
            'employees' => $this->employees->map(function ($employee) {
                return [
                    'name' => $employee->name,
                    'image_url' => $employee->image_url,
                ];
            }),
            'dailyTimeslots' => $this->dailyTimeslots->map(function ($timeslot) {
                return [
                    'start_time' => $timeslot->start_time,
                    'date' => $timeslot->date,
                ];
            }),

        ];
    }
}
