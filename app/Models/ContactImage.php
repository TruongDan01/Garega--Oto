<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactImage extends Model
{
    use HasFactory;

    protected $table = 'contact_images';

    protected $fillable = [
        'contact_id',
        'image_url',
        'orders'
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    public static function getContactImages()
    {
        return self::select('contact_id', 'image_url')
            ->orderBy('orders')
            ->get();
    }
}
