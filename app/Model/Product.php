<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
      'id',
      'name',
      'description',
      'price',
      'category_id',
      'image_url',
      'status'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function promotion()
    {
        return $this->hasMany(Promotion::class);
    }
}
