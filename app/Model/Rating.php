<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
      'appointment_id',
      'rating_value',
      'rating_status',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

}
