<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branch;
use App\Models\CustomerInformation;
use App\Models\User;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';

    protected $fillable = [
        'id',
        'customer_id',
        'branch_id',
        'employee_id',
        'appointment_date',
        'status',
        'orders',
        'created_at',
        'updated_at'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function customer()
    {
        return $this->belongsTo(CustomerInformation::class, 'customer_id');
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function getAppointmentDetails()
    {
        return [
            'id' => $this->id,
            'appointment_date' => $this->appointment_date,
            'status' => $this->getStatusText(),
            'branch' => [
                'name' => $this->branch->name,
                'address' => $this->branch->address,
            ],
        ];
    }

    private function getStatusText()
    {
        switch ($this->status) {
            case 0:
                return 'Hủy bỏ';
            case 1:
                return 'Chờ xác nhận';
            case 2:
                return 'Đã xác nhận';
            case 3:
                return 'Hoành thành';
            default:
                return 'Trạng thái không xác định';
        }
    }

}
