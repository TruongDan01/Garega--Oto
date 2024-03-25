<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'image_url',
        'orders',
        'status',
        'created_at',
        'updated_at',
    ];

    public static function getProductsByCategory($categoryId)
    {
        $category = Category::with([
            'products' => function ($query) {
                $query->orderBy('id', 'asc');
            }
        ])->find($categoryId);

        if (!$category) {
            return response()->json(['message' => 'Danh mục không tồn tại'], 404);
        }

        $products = $category->products;

        return response()->json(['products' => $products], 200);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
