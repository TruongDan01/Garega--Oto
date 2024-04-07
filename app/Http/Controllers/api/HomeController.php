<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ContactImage;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ContactImageResource;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::getProducts();
        $imagesContact = ContactImage::getContactImages();

        $data = [
            'products' => ProductResource::collection($products),
            'imagesContact' => ContactImageResource::collection($imagesContact)
        ];
        return response()->json($data);
    }
}
