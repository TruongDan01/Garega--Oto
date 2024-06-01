<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentDetail extends Model
{
    use HasFactory;
    protected $table = 'appointment_details';

    protected $fillable = [
      'appointment_id',
      'product_id',
      'qr',
      ''
    ];
}
