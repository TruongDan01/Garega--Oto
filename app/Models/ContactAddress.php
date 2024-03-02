<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactAddress extends Model
{
    use HasFactory;

    protected $table = 'contact_addresses';

    protected $fillable = [
        'contact_id',
        'address',
        'orders'
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }
}
