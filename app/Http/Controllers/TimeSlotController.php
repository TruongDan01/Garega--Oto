<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\TimeSlot;
use Illuminate\Http\Request;

class TimeSlotController extends Controller
{
    public function index()
    {
        $timeslots = TimeSlot::all(['id', 'start_time']);
        return $timeslots;
    }
}
