<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Model\Employee;
use App\Model\TimeSlot;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function getAllTimeSlotByEmployeeId($id)
    {

        $employeeSchedules = Employee::where('user_id', $id)->pluck('timeslot_id');

        $availableTimeSlots = TimeSlot::whereNotIn('id', $employeeSchedules)->get();

        return EmployeeResource::collection($availableTimeSlots);
    }
}
