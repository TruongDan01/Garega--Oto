<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
      'address',
      'phone_number',
      'province_id',
      'status'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
