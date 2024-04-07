<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\User;
use App\Models\DailyTimeslot;
use App\Models\Appointment;
use App\Models\EmployeeSchedule;
use App\Http\Resources\BranchResource;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();

        foreach ($appointments as $appointment) {

            $branch = Branch::find($appointment->branch_id);
            $appointment->branch_name = $branch->name;
            $appointment->branch_address = $branch->address;

            if ($appointment->status == 1) {
                $appointment->status_name = 'Đang xác nhận';
            } else if ($appointment->status == 2) {
                $appointment->status_name = 'Đã xác nhận';
            } else {
                $appointment->status_name = 'Chưa xác nhận';
            }
        }

        return response()->json($appointments);
    }

    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);
        return response()->json($appointment);
    }
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
