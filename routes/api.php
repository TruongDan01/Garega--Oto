<?php

use App\Http\Controllers\api\AppointmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\HomeController;
use App\Http\Controllers\api\ServiceController;
use App\Http\Controllers\api\BranchController;
use App\Http\Controllers\api\AppointmentDetailController;

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
    'home' => HomeController::class,
    'services' => ServiceController::class,
    'branches' => BranchController::class,
    'appointments' => AppointmentController::class,
    'appointment_details' => AppointmentController::class
]);
Route::get('services/category/{serviceType}', [ServiceController::class, 'getServicesByCategory']);
Route::get('appointment/create/{branchId}/{userId}', [AppointmentController::class, 'getBranchDetails']);
Route::get('/appointments', [AppointmentController::class, 'index']);
Route::get('appointments/{id}', [AppointmentController::class, 'show']);
