<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;
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
Route::get('/visitor', [VisitorController::class,'VisitorIndex']);

//Admin panel Service Section
Route::get('/service', [ServiceController::class,'ServiceIndex']);
Route::get('/GetServiceData', [ServiceController::class,'GetServiceData']);
Route::post('/ServiceDelete', [ServiceController::class,'ServiceDelete']);
Route::post('/ServiceDetails', [ServiceController::class,'GetServiceDetails']);
Route::post('/ServiceUpdate', [ServiceController::class,'ServiceUpdate']);
Route::post('/ServiceAdd', [ServiceController::class,'ServiceAdd']);

//Admin panel Courses Section
Route::get('/courses', [CoursesController::class,'CoursesIndex']);
Route::get('/GetCoursesData', [CoursesController::class,'GetCoursesData']);
Route::post('/CourseDelete', [CoursesController::class,'CourseDelete']);
Route::post('/CourseDetails', [CoursesController::class,'GetCourseDetails']);
Route::post('/CourseUpdate', [CoursesController::class,'CourseUpdate']);
Route::post('/CourseAdd', [CoursesController::class,'CourseAdd']);

//Admin panel Project Section
Route::get('/project', [ProjectController::class,'ProjectIndex']);
Route::get('/GetProjectsData', [ProjectController::class,'GetProjectData']);
Route::post('/ProjectDelete', [ProjectController::class,'ProjectDelete']);
Route::post('/ProjectDetails', [ProjectController::class,'GetProjectDetails']);
Route::post('/ProjectUpdate', [ProjectController::class,'ProjectUpdate']);
Route::post('/ProjectAdd', [ProjectController::class,'ProjectAdd']);


//Admin panel Contact Section
Route::get('/contact', [ContactController::class,'ContactIndex']);
Route::get('/GetContactData', [ContactController::class,'GetContactData']);
Route::post('/ContactDelete', [ContactController::class,'ContactDelete']);

//Admin panel Project Section
Route::get('/review', [ReviewController::class,'ReviewIndex']);
Route::get('/GetReviewsData', [ReviewController::class,'GetReviewData']);
Route::post('/ReviewDelete', [ReviewController::class,'ReviewDelete']);
Route::post('/ReviewDetails', [ReviewController::class,'GetReviewDetails']);
Route::post('/ReviewUpdate', [ReviewController::class,'ReviewUpdate']);
Route::post('/ReviewAdd', [ReviewController::class,'ReviewAdd']);