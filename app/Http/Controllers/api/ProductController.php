<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ContactImage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::getProducts();
        $contactImages = ContactImage::getContactImages();

        $data = [
            'products' => $products,
            'contactImages' => $contactImages,
        ];

        return response()->json($data);
    }

    public function getByCategory($categoryId)
    {
        $services = Category::getProductsByCategory($categoryId);

        return response()->json($services);
    }
}
