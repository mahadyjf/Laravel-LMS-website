<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\visitor;
use App\Models\Service;
use App\Models\course;
use App\Models\project;
use App\Models\contact;
use App\Models\review;

class HomeController extends Controller
{
  function HomeIndex(){
    $UserIP = $_SERVER['REMOTE_ADDR'];
    date_default_timezone_set("Asia/Dhaka");
    $timeDate = date("Y-m-d h:i:sa");
    visitor::insert(['ip_address'=>$UserIP, 'visit_time'=>$timeDate]);

    $ServiceData = json_decode(Service::orderBy('id', 'desc')->limit(4)->get());
    $CourseData = json_decode(course::orderBy('id', 'desc')->limit(6)->get());
    $ProjectData = json_decode(project::orderBy('id', 'desc')->limit(10)->get());
    $ReviewData = json_decode(review::all());

    return view('home',[
      'ServiceData'=>$ServiceData,
      'CourseData'=>$CourseData,
      'ProjectData'=>$ProjectData,
      'ReviewData'=>$ReviewData
    ]);
  }

  function ContactSend(Request $req){
    $name = $req->input('contact_name');
    $mobile = $req->input('contact_mobile');
    $email = $req->input('contact_email');
    $message = $req->input('contact_message');
    $result = contact::insert([
      'contact_name'=>$name,
      'contact_mobile'=>$mobile,
      'contact_email'=>$email,
      'contact_message'=>$message
    ]);

    if($result == true){
      return 1;
    }else {
      return 0;
    }
  }

}
