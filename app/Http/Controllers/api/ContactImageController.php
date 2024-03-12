<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactImage;


class ContactImageController extends Controller
{
    public function index()
    {
        $contactImages = ContactImage::orderBy('orders')
        ->get(['contact_id', 'image_url']);

        return response()->json($contactImages);
    }
}
