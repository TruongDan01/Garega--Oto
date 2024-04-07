<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\User;
use App\Models\DailyTimeslot;
use App\Models\EmployeeSchedule;
use App\Http\Resources\BranchResource;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function getBranchDetails($branchId, $userId)
    {
        $branch = Branch::find($branchId);


        $employees = User::where('branch_id', $branchId)->where('role', 1)->get();

        $branchData = [
            'name' => $branch->name,
            'address' => $branch->address,
        ];

        $employeeData = $employees->map(function ($employee) {
            return [
                'name' => $employee->name,
                'image_url' => $employee->image_url,
            ];
        });

        $dailyTimeslots = DailyTimeslot::all();

        $timeslotData = $dailyTimeslots->map(function ($timeslot) {
            return [
                'start_time' => $timeslot->start_time,
                'date' => $timeslot->date,
                'timeslot_id' => $timeslot->id,
            ];
        });

        return response()->json([
            'branch' => $branchData,
            'employees' => $employeeData,
            'dailyTimeslots' => $timeslotData,
        ]);
    }
}
