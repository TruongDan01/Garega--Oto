<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppointmentDetail;

class AppointmentDatailController extends Controller
{
    public function show($id)
    {
        $appointmentDetail = AppointmentDetail::findOrFail($id);
        return response()->json($appointmentDetail);
    }
}
