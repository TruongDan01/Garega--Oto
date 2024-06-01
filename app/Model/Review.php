<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
      'appointment_id',
      'rating',
      'comment',
      'status'
    ];
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

}
