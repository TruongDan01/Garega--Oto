<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;
    protected $table = 'daily_timeslots';
    protected $fillable = [
      'start_time'
    ];
}
