<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\PromotionResource;
use App\Model\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        return PromotionResource::collection(Promotion::all());
    }

    public function show($id)
    {
        return new PromotionResource(Promotion::findOrFail($id));
    }
}
