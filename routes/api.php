<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/get_daily_routine',[ApiController ::class,'get_daily_routine']);
Route::post('/get_mission',[ApiController ::class,'get_mission']);
Route::post('/get_loa_90',[ApiController ::class,'get_loa_90']);
Route::post('/get_loa_30',[ApiController ::class,'get_loa_30']);
