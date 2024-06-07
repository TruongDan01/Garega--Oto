<?php

namespace App\Model;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
      'id',
      'zalo_id',
      'branch_id',
      'employee_id',
      'appointment_date',
      'status'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function employee()
    {
        return $this->belongsTo(User::class);
    }

    public function appointmentDetail()
    {
        return $this->hasMany(AppointmentDetail::class);
    }
}
