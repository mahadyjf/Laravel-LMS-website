<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TramsController;
use App\Http\Controllers\PolicyController;
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

Route::get('/', [HomeController::class,'HomeIndex']);
Route::post('/contactsend', [HomeController::class,'ContactSend']);

Route::get('/courses', [CoursesController::class,'CoursePage']);

Route::get('/projects', [ProjectController::class,'ProjectPage']);

Route::get('/trams', [TramsController::class,'TrmasPage']);

Route::get('/policy', [PolicyController::class,'PolicyPage']);
