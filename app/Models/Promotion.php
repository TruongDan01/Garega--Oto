<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $table = 'promotions';

    protected $fillable = [
        'products_id',
        'name',
        'description',
        'status',
        'start_date',
        'end_date',
        'orders'
    ];
}
