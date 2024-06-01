<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\AppointmentResource;
use App\Model\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        return AppointmentResource::collection(Appointment::all());
    }

    public function show($id)
    {
        return new AppointmentResource(Appointment::findOrFail($id));
    }

    public function store()
    {
        $appointment = Appointment::create();
        return new AppointmentResource($appointment);
    }

    public function getAllAppointmentsByUserId($userId)
    {
        $appointments = Appointment::where('customer_id', $userId)->get();

        return AppointmentResource::collection($appointments);
    }
}
