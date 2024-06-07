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
        $staffs = User::where('role', 0)
            ->where('status', 1)
            ->get();
        return UserResource::collection($staffs);
    }
}
