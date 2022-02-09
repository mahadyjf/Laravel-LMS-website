<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\visitor;

class VisitorController extends Controller
{
    function VisitorIndex(){
    	$VisitorData = json_decode(visitor::orderBy('id', 'desc')->take(500)->get(), true);
    	return view('visitor', ['VisitorData'=>$VisitorData]);
    }
}
