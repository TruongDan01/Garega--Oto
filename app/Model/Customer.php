<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer_information';

    protected $fillable = [
      'name',
      'email',
      'phone',
      'address',
      'status'
    ];
}
