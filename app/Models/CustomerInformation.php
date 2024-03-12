<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInformation extends Model
{
    use HasFactory;

    protected $table = 'customer_information';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'status',
        'orders',
        'created_at',
        'updated_at',
    ];
}
