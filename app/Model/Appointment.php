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
      'customer_id',
      'branch_id',
      'employee_id',
      'appointment_date',
      'notes',
      'status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    // cần sử duụng bên AppointmentResource : status => $this->status_text;
    public function getStatusTextAttribute()
    {
        switch ($this->status) {
            case 0:
                return 'Chờ xác nhận';
            case 1:
                return 'Đã xác nhận';
            case 2:
                return 'Đã hủy';
            default:
                return 'Chưa có trạng thái';
        }
    }
    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->appointment_date)->format('H:i:s d-m-Y');
    }
}
