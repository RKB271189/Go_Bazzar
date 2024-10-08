<?php

use App\Http\Controllers\Admin\AdvertiseController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BazzarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MiscellaneousController;
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

Route::get('/menu', [BazzarController::class, 'menus']);
Route::post('/send/code', [AuthController::class, 'sendCode']);
Route::post('/create/account', [AuthController::class, 'createAccount']);
Route::post('/change/password', [AuthController::class, 'changePassword']);
Route::post('/verify/account', [AuthController::class, 'verifyAccount']);
Route::get('/home', [BazzarController::class, 'home']);
Route::get('/advertise/{slug?}', [BazzarController::class, 'advertise']);
Route::get('/service', [BazzarController::class, 'service']);
Route::get('/business', [BazzarController::class, 'business']);
Route::get('/other', [BazzarController::class, 'other']);
Route::get('/newspaper', [BazzarController::class, 'newspaper']);
Route::get('/fetch/advertise/{id}', [UserController::class, 'singleAdvertisement']);
Route::get('/fetch/service/{id}', [UserController::class, 'singleService']);
Route::get('/fetch/business/{id}', [UserController::class, 'singleBusiness']);
Route::middleware(['auth:sanctum', 'auth:api'])->group(function () {
    Route::middleware('role.admin')->group(function () {
        //Route::get('/role-list', [RoleController::class, 'index']);
        Route::resource('roles', RoleController::class);
        Route::get('/roles/{role}/permissions', [RoleController::class, 'permissions']);
        Route::post('/roles/assign/permission', [RoleController::class, 'assignPermissionToRole']);
        Route::resource('permissions', PermissionController::class);
        Route::get('/admin/fetch/advertise', [AdvertiseController::class, 'fetch'])->name('admin.advertise');
    });
    Route::middleware('role.user')->group(function () {
        Route::get('/daily/analysis', [DashboardController::class, 'dailyAnalysis']);
        Route::get('/fetch/profile', [UserController::class, 'fetchProfile']);
        Route::post('/create/profile', [UserController::class, 'createProfile']);
        Route::get('/fetch/advertise', [UserController::class, 'advertisment']);
        Route::post('/create/advertise', [UserController::class, 'createAdvertisement']);
        Route::post('/upload/advertise/image', [UserController::class, 'uploadAdvertisementImage']);
        Route::get('/fetch/others', [UserController::class, 'others']);
        Route::post('/create/service', [UserController::class, 'createService']);
        Route::post('/create/business', [UserController::class, 'createBusiness']);
    });
});
/** Admin routes */

Route::post('logout', [AuthController::class, 'logout']);

//Miscellaneous routes
Route::middleware(['validate.miscellaneous'])->group(function () {
    Route::post('/send/email', [MiscellaneousController::class, 'sendEmail']);
});
