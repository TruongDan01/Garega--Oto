<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Http\Resources\AppointmentResource;
use Illuminate\Http\Response;
use App\Http\Resources\BranchResource;
use App\Models\Branch;
use App\Models\Product;

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

}
