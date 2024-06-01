<?php

namespace App\Model;

use App\Model\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee_schedules';

    protected $fillable = [
      'user_id',
      'timeslot_id',
      'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function timeslot()
    {
        return $this->belongsTo(TimeSlot::class);
    }

}
