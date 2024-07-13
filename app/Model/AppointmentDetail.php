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
      'time_picker_id',
      'customer_name',
      'customer_email',
      'customer_address',
      'customer_phone',
      'customer_note'
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

}
