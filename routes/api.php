<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\SchedulerController;
use App\Http\Controllers\NewApiController;
use App\Http\Controllers\StudentApiController;
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

Route::post('/get_loa_unproductive_task',[NewApiController ::class,'get_loa_unproductive_task']);
Route::post('/set_mood',[ApiController ::class,'set_mood']);

Route::post('/get_loa_lesson_of_day',[NewApiController ::class,'get_loa_lesson_of_day']);
Route::post('/insert_loa_lessons_of_day',[ApiController ::class,'insert_loa_lessons_of_day']);
Route::post('/insert_unique_things',[ApiController ::class,'insert_unique_things']);
Route::post('/insert_loa_how_was_day',[ApiController ::class,'insert_loa_how_was_day']);
Route::post('/insert_loa_unproductive_task',[ApiController ::class,'insert_loa_unproductive_task']);
Route::post('/get_30day_mood',[ApiController ::class,'get_30day_mood']);

Route::post('/insert_elite_petals',[NewApiController ::class,'insert_elite_petals']);
Route::post('/insert_subject_covered_today',[NewApiController ::class,'insert_subject_covered_today']);
Route::post('/insert_topic_covered_today',[NewApiController ::class,'insert_topic_covered_today']);

Route::post('/insert_elite_stud_petals',[StudentApiController ::class,'insert_elite_stud_petals']);
Route::post('/get_petals_percentage',[ApiController ::class,'get_petals_percentage']);
Route::post('/get_petals',[ApiController ::class,'get_petals']);
Route::post('/insert_stud_daily_planner',[StudentApiController ::class,'insert_stud_daily_planner']);
Route::post('/get_stud_daily_planner',[StudentApiController ::class,'get_stud_daily_planner']);
Route::post('/get_student_petals_percent',[StudentApiController ::class,'get_student_petals_percent']);
Route::post('/stud_learn_and_tech_percent',[StudentApiController ::class,'stud_learn_and_tech_percent']);
Route::post('/stud_intelectual_break_percent',[StudentApiController ::class,'stud_intelectual_break_percent']);
Route::post('/stud_rule_of_three_percent',[StudentApiController ::class,'stud_rule_of_three_percent']);
