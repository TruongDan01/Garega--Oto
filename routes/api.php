<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\ContactImageController;
use App\Http\Controllers\api\AppointmentDatailController;
use App\Http\Controllers\api\BranchController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'home' => ProductController::class,
    'appointment' => AppointmentDatailController::class,
    'branch' => BranchController::class,
    'appointments/create' => BranchController::class,

]);

Route::get('services/{categoryId}', [ProductController::class, 'getByCategory']);
