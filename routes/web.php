<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Auth::routes();
Route::get('/logout',[HomeController::class,'logout']);
Route::get('/showuser',[AdminController::class,'showuser']);
Route::post('/register_user',[AdminController::class,'register_user']);
Route::post('/edit_user',[AdminController::class,'edit_user']);
Route::get('/delete_user/{id}',[AdminController::class,'delete_user']);
Route::get('/basicplan',[AdminController::class,'basicplan']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
