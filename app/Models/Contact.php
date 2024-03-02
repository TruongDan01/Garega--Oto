<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = [
        'description',
        'phone_number',
        'orders'
    ];

    public function addresses()
    {
        return $this->hasMany(ContactAddress::class, 'contact_id');
    }

    public function images()
    {
        return $this->hasMany(ContactImage::class, 'contact_id');
    }
}
