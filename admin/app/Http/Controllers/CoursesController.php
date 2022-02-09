<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;

class CoursesController extends Controller
{
     function CoursesIndex(){
    	return view('Course');
    }

     function GetCoursesData(){
    	$result = json_decode(course::orderBy('id', 'desc')->get());
    	return $result;
    }

     function GetCourseDetails(Request $req){
     	$id = $req->input('id');
    	$result = course::where('id', $id)->get();
    	return $result;
    }

    function CourseUpdate(Request $req){
   		$id = $req->input('id');
   		$name        = $req->input('name');
   		$des         = $req->input('des');
   		$fee         = $req->input('fee');
   		$totalEnroll = $req->input('totalenroll');
   		$totalClass  = $req->input('totalClass');
   		$link        = $req->input('link');
   		$img         = $req->input('img');
   		
    	$result = course::where('id', $id)->update([
    		'course_name'=>$name, 
    		'course_des'=>$des, 
    		'course_fee'=>$fee,
    		'course_totalenroll'=>$totalEnroll,
    		'course_totalclass'=>$totalClass,
    		'course_link'=>$link,
    		'course_img'=>$img
    	]);
    	if($result==true){
    		return 1;
    	}else{
    		return 0;
    	}
    }


    function CourseAdd(Request $req){
   		
   		$name        = $req->input('name');
   		$des         = $req->input('des');
   		$fee         = $req->input('fee');
   		$totalEnroll = $req->input('totalenroll');
   		$totalClass  = $req->input('totalClass');
   		$link        = $req->input('link');
   		$img         = $req->input('img');
   		
    	$result = course::insert([
    		'course_name'=>$name, 
    		'course_des'=>$des, 
    		'course_fee'=>$fee,
    		'course_totalenroll'=>$totalEnroll,
    		'course_totalclass'=>$totalClass,
    		'course_link'=>$link,
    		'course_img'=>$img
    	]);
    	if($result==true){
    		return 1;
    	}else{
    		return 0;
    	}
    }


   function CourseDelete(Request $req){
   		$id = $req->input('id');
    	$result = course::where('id', $id)->delete();
    	if($result==true){
    		return 1;
    	}else{
    		return 0;
    	}
    }


}
