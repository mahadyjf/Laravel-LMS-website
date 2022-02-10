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
    	$totalVisitor = visitor::count();
    	$totalService = Service::count();
    	$totalcourse = course::count();
    	$totalproject = project::count();
    	$totalcontact = contact::count();
    	$totalreview = review::count();
    	return view('home', [
    		'totalVisitor'=>$totalVisitor,
    		'totalService'=>$totalService,
    		'totalcourse'=>$totalcourse,
    		'totalproject'=>$totalproject,
    		'totalcontact'=>$totalcontact,
    		
    		'totalreview'=>$totalreview,
    	]);
    }
}
