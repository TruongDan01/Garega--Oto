<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
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
        $services = Product::getByCategory($categoryId);

        return response()->json($services);
    }
}
