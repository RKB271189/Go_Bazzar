<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/send/code', [AuthController::class, 'sendCode']);
Route::post('/create/account', [AuthController::class, 'createAccount']);
Route::post('/verify/account', [AuthController::class, 'verifyAccount']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/daily/analysis', [DashboardController::class, 'dailyAnalysis']);
    Route::get('/fetch/profile', [UserController::class, 'fetchProfile']);
    Route::post('/create/profile', [UserController::class, 'createProfile']);
    Route::get('/fetch/advertise', [UserController::class, 'advertisment']);
    Route::get('/fetch/advertise/{id}', [UserController::class, 'singleAdvertisement']);
    Route::post('/create/advertise', [UserController::class, 'createAdvertisement']);
    Route::post('/upload/advertise/image', [UserController::class, 'uploadAdvertisementImage']);
});
