<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\AppointmentDetailResource;
use App\Http\Resources\AppointmentResource;
use App\Model\Appointment;
use App\Model\AppointmentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function getAllAppointmentsByZaloId($id)
    {
        $appointments = Appointment::where('zalo_id', $id)->get();
        return AppointmentResource::collection($appointments);
    }

    public function add(Request $request)
    {
        DB::beginTransaction();
        try {
            $appointment = Appointment::create([
                'zalo_id' => $request->zalo_id,
                'branch_id' => $request->branch_id,
                'employee_id' => $request->employee_id,
                'appointment_date' => $request->appointment_date,
                'status' => $request->status
            ]);
            $appointmentDetailsData = $request->appointment_details;
            foreach ($appointmentDetailsData as $detail) {
                AppointmentDetail::create([
                    'appointment_id' => $appointment->id,
                    'product_id' => $detail['product_id'],
                    'time_picker_id' => $detail['time_picker_id'],
                    'customer_name' => $detail['customer_name'],
                    'customer_email' => $detail['customer_email'],
                    'customer_address' => $detail['customer_address'],
                    'customer_phone' => $detail['customer_phone'],
                    'customer_note' => $detail['customer_note']
                ]);
            }
            DB::commit();
            return new AppointmentResource($appointment);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Something went really wrong'
            ], 500);
        }    }

    public function update(Request $request, $id)
    {
        try {
            $appointment = Appointment::findOrFail($id);
            $appointment->update([
                'status' => $request->status,
            ]);
            return response()->json([
                'message' => "Appointment successfully updated"
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went really wrong'
            ], 500);
        }
    }

    public function detail($id)
    {
        $appointmentDetail = AppointmentDetail::where('appointment_id', $id)->get();
        return AppointmentDetailResource::collection($appointmentDetail);
    }

}
