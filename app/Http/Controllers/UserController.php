<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\UserResource;
use App\Model\Employee;
use App\Model\TimeSlot;
use App\Model\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $staffs = Employee::where('employee_transfers.status', 1)
            ->join('users', 'employee_transfers.employee_id', '=', 'users.id')
            ->join('branches', 'employee_transfers.branch_id', '=', 'branches.id')
            ->where('users.role', 0)
            ->where('users.status', 1)
            ->select('employee_transfers.id','users.id as user_id','users.name', 'users.avatar', 'branches.id as branch_id', 'employee_transfers.status')
            ->get();

        if ($staffs->isEmpty()) {
            return response()->json(['error' => 'Lỗi điều kiện'], 404);
        }

        return UserResource::collection($staffs);
    }
}
