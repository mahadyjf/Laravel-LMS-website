<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;
class CoursesController extends Controller
{
  function CoursePage(){
    $CourseData = json_decode(course::orderBy('id', 'desc')->get());
    return view('courses', ["CourseData"=>$CourseData]);
  }
}
