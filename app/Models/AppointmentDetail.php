<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentDetail extends Model
{
    use HasFactory;

    protected $table = 'appointment_details';

    protected $fillable = [
        'appointment_id',
        'qr_code',
        'status',
        'start_time',
        'end_time',
        'orders'
    ];
}
