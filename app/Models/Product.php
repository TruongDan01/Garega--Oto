<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image_url',
        'status',
        'orders',
        'created_at',
        'updated_at',
    ];

    public static function getByCategoryId($categoryId)
    {
        return self::where('category_id', $categoryId)
            ->orderBy('id', 'asc')
            ->take(20)
            ->select('name', 'image_url', 'price')
            ->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
