<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
      'zalo_id',
      'name',
      'phone',
      'email',
      'role',
      'avatar',
      'branch_id',
      'status',
    ];
    protected $hidden = [
       'password',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
