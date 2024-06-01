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
    public function getAllEmployeeByBranchId($id)
    {
        $employees = User::where('branch_id', $id)
            ->where('role', 0)
            ->get();
        return UserResource::collection($employees);
    }
}
