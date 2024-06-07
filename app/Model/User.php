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
      'status',
    ];
    protected $hidden = [
       'password',
    ];
}
