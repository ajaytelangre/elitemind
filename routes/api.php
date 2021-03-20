<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\SchedulerController;
use App\Http\Controllers\NewApiController;
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
Route::post('/get_loa_plan_of_day',[ApiController ::class,'get_loa_plan_of_day']);
Route::post('/get_loa_daily_planner',[ApiController ::class,'get_loa_daily_planner']);
Route::post('/get_loa_how_was_day',[ApiController ::class,'get_loa_how_was_day']);
Route::post('/get_plans',[ApiController ::class,'get_plans']);
Route::post('/set_loa_daily_planner',[ApiController ::class,'set_loa_daily_planner']);
Route::post('/planner_list',[ApiController ::class,'planner_list']);
Route::post('/set_subscription',[ApiController ::class,'set_subscription']);

Route::post('/test',[ApiController ::class,'test']);
Route::post('/get_loa_gratification',[NewApiController ::class,'get_loa_gratification']);
Route::post('/get_loa_unique_things',[NewApiController ::class,'get_loa_unique_things']);
Route::post('/set_loa_gratification',[ApiController ::class,'set_loa_gratification']);
Route::post('/get_loa_lesson_of_day',[NewApiController ::class,'get_loa_lesson_of_day']);
