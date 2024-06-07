<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TimeSlotController;
use App\Http\Controllers\RatingController;

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

//=======| All Appointment by Zalo id | Update | Create Appointment and Appointment Detail |=======//
Route::get('appointments/zalo={id}', [AppointmentController::class, 'getAllAppointmentsByZaloId']);
Route::get('appointment/detail/{id}', [AppointmentController::class, 'detail']);
Route::put('appointment/update/{id}', [AppointmentController::class, 'update']);
Route::post('appointment/add', [AppointmentController::class, 'add']);
//==============================================================//

// ======= ratings ======= //
Route::get('ratings', [RatingController::class, 'index']);
Route::get('ratings/appointment={id}', [RatingController::class, 'show']);
Route::post('ratings/appointment={id}', [RatingController::class, 'store']);

// ======= category ======= //
Route::apiResource('categories', CategoryController::class)->only(['index']);

// ======= products ======= //
Route::apiResource('products', ProductController::class)->only(['index']);

// ======= branches ======= //
Route::apiResource('branches', BranchController::class)->only(['index']);

// ======= staffs ======= //
Route::apiResource('staffs', UserController::class)->only(['index']);

// ======= timeslots ======= //
Route::apiResource('timeslots',TimeSlotController::class)->only(['index']);

// ======= promotion ======= //
Route::apiResource('promotions', PromotionController::class)->only(['index', 'show']);
