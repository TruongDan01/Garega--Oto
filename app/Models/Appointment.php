<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

 
}
