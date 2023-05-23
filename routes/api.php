<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('regions', function (Request $request) {
    $subDistricts = DB::table('sub_districts')->where('city_code', intval($request->city))->where('district_code', intval($request->district))->orderBy('name')->get();
    return response()->json($subDistricts);
});

// @device
Route::post('device/set-data', [DeviceController::class, 'store']);

// get all user for dashboard page
Route::get('user-coords', [UserController::class, 'getCoords'])->name('users.coords');
