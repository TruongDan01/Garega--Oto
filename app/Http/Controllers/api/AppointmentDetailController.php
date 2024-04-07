<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AppointmentDetailResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\AppointmentDetail;


class AppointmentDetailController extends Controller
{

    public function store(Request $request)
    {
        $resource = new AppointmentDetailResource($request);
        $data = $resource->toArray($request);

        $appointmentDetail = AppointmentDetail::create($data);

        return new AppointmentDetailResource($appointmentDetail);
    }



}
