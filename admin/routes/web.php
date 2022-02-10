<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PhotoController;
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

Route::get('/', [HomeController::class,'HomeIndex'])->middleware('loginCheck');
Route::get('/visitor', [VisitorController::class,'VisitorIndex'])->middleware('loginCheck');

//Admin panel Service Section
Route::get('/service', [ServiceController::class,'ServiceIndex'])->middleware('loginCheck');
Route::get('/GetServiceData', [ServiceController::class,'GetServiceData'])->middleware('loginCheck');
Route::post('/ServiceDelete', [ServiceController::class,'ServiceDelete'])->middleware('loginCheck');
Route::post('/ServiceDetails', [ServiceController::class,'GetServiceDetails'])->middleware('loginCheck');
Route::post('/ServiceUpdate', [ServiceController::class,'ServiceUpdate'])->middleware('loginCheck');
Route::post('/ServiceAdd', [ServiceController::class,'ServiceAdd'])->middleware('loginCheck');

//Admin panel Courses Section
Route::get('/courses', [CoursesController::class,'CoursesIndex'])->middleware('loginCheck');
Route::get('/GetCoursesData', [CoursesController::class,'GetCoursesData'])->middleware('loginCheck');
Route::post('/CourseDelete', [CoursesController::class,'CourseDelete'])->middleware('loginCheck');
Route::post('/CourseDetails', [CoursesController::class,'GetCourseDetails'])->middleware('loginCheck');
Route::post('/CourseUpdate', [CoursesController::class,'CourseUpdate'])->middleware('loginCheck');
Route::post('/CourseAdd', [CoursesController::class,'CourseAdd'])->middleware('loginCheck');

//Admin panel Project Section
Route::get('/project', [ProjectController::class,'ProjectIndex'])->middleware('loginCheck');
Route::get('/GetProjectsData', [ProjectController::class,'GetProjectData'])->middleware('loginCheck');
Route::post('/ProjectDelete', [ProjectController::class,'ProjectDelete'])->middleware('loginCheck');
Route::post('/ProjectDetails', [ProjectController::class,'GetProjectDetails'])->middleware('loginCheck');
Route::post('/ProjectUpdate', [ProjectController::class,'ProjectUpdate'])->middleware('loginCheck');
Route::post('/ProjectAdd', [ProjectController::class,'ProjectAdd'])->middleware('loginCheck');


//Admin panel Contact Section
Route::get('/contact', [ContactController::class,'ContactIndex'])->middleware('loginCheck');
Route::get('/GetContactData', [ContactController::class,'GetContactData'])->middleware('loginCheck');
Route::post('/ContactDelete', [ContactController::class,'ContactDelete'])->middleware('loginCheck');

//Admin panel Project Section
Route::get('/review', [ReviewController::class,'ReviewIndex'])->middleware('loginCheck');
Route::get('/GetReviewsData', [ReviewController::class,'GetReviewData'])->middleware('loginCheck');
Route::post('/ReviewDelete', [ReviewController::class,'ReviewDelete'])->middleware('loginCheck');
Route::post('/ReviewDetails', [ReviewController::class,'GetReviewDetails'])->middleware('loginCheck');
Route::post('/ReviewUpdate', [ReviewController::class,'ReviewUpdate'])->middleware('loginCheck');
Route::post('/ReviewAdd', [ReviewController::class,'ReviewAdd'])->middleware('loginCheck');

//login
Route::get('/loginpage', [LoginController::class,'LoginIndex']);
Route::post('/login', [LoginController::class,'onLogin']);
Route::get('/logout', [LoginController::class,'onLogOut']);

//photo gellary
Route::get('/photo', [PhotoController::class,'PhotoIndex']);
Route::post('/PhotoUpload', [PhotoController::class,'PhotoUpload']);
Route::get('/photoJson', [PhotoController::class,'photoJson']);

Route::get('/photoJsonByID/{id}', [PhotoController::class,'photoJsonByID']);
Route::post('/photoDelete', [PhotoController::class,'photoDelete']);