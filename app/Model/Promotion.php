<?php

namespace App\Model;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = [
        'products_id',
        'name',
        'description',
        'status',
        'start_date',
        'end_date'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

}
