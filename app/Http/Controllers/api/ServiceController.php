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
        $categories = Category::all();
        $services = Product::where('category_id', 1)
            ->select('name', 'image_url')
            ->get();
        $data = [
            'services' => ProductResource::collection($services),
            'categories' => CategoryResource::collection($categories)
        ];
        return response()->json($data);

    }
    public function getServicesByCategory(Request $request, $categoryId)
    {
        $services = Product::getByCategoryId($categoryId);

        return response()->json(ProductResource::collection(['services' => $services]), 200);
    }
}
