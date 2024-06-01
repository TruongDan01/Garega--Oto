<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;

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

    // ======= category ======= //
Route::apiResource('categories', CategoryController::class)->only(['index', 'show']);

    // ======= products ======= //
Route::apiResource('products', ProductController::class)->only(['index', 'show']);

    // ======= branch ======= //
Route::apiResource('branches', BranchController::class)->only(['index', 'show']);

    // ======= promotion ======= //
Route::apiResource('promotions', PromotionController::class)->only(['index', 'show']);

    // ======= All Appointment by Customer ======= //
Route::get('allAppointment/customer_id={user_id}', [AppointmentController::class, 'getAllAppointmentsByUserId']);

    // ======= Get All Employee By Branch Id ======= //
Route::get('allEmployee/branch_id={id}', [UserController::class, 'getAllEmployeeByBranchId']);

    // ======= Get All TimeSlot By User Id ======= //
Route::get('allTimeSlot/user_id={id}', [EmployeeController::class, 'getAllTimeSlotByEmployeeId']);

//    // ======= Insert Appointment and AppointmentDetail ======= //
//Route::apiResource('appointment', AppointmentController::class)->only(['index','show','store']);

