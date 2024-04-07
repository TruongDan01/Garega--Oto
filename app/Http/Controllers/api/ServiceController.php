<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Resources\ProductResource;
use App\Http\Resources\CategoryResource;

class ServiceController extends Controller
{
    public function index()
    {
        $categories = Category::select('category_name', 'image_url')
        ->get();
        
        $services = Product::where('category_id', 1)
            ->select('name', 'image_url')
            ->get();

        $data = ProductResource::collection([
            'services' => $services,
            'categories' => $categories
        ]);

        return $data;

    }
    public function getServicesByCategory(Request $request, $categoryId)
    {
        $services = Product::getByCategoryId($categoryId);
        $data = ProductResource::collection(['services' => $services]);
        return $data;
    }
}
