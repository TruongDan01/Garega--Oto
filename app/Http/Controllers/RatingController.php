<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::all(['id', 'appointment_id', 'rating_value', 'rating_status', 'orders']);
        return $ratings;
    }

    public function show($id)
    {
        $rating = Rating::where('appointment_id', $id)->get(['id', 'appointment_id', 'rating_value', 'rating_status', 'orders']);
        return $rating;
    }

    public function store(Request $request, $id)
    {
        $rating = Rating::create([
            'appointment_id' => $id,
            'rating_value' => $request->rating_value,
            'rating_status' => $request->rating_status,
        ]);

        return $rating;
    }
}
