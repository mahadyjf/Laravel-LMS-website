<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\review;

class ReviewController extends Controller
{
   function ReviewIndex(){
    	return view('Reviews');
    }

    function GetReviewData(){
    	$result = json_decode(review::orderBy('id', 'desc')->get());
    	return $result;
    }

     function GetreviewDetails(Request $req){
     	$id = $req->input('id');
    	$result = review::where('id', $id)->get();
    	return $result;
    }

    function ReviewUpdate(Request $req){
   		$id = $req->input('id');
   		$name = $req->input('name');
   		$des = $req->input('des');
   		$img = $req->input('img');
   		
    	$result = review::where('id', $id)->update(['name'=>$name, 'des'=>$des, 'img'=>$img]);
    	if($result==true){
    		return 1;
    	}else{
    		return 0;
    	}
    }


    function reviewAdd(Request $req){
   		
   		$name = $req->input('name');
   		$des = $req->input('des');
   		$img = $req->input('img');
   		
    	$result = review::insert(['name'=>$name, 'des'=>$des, 'img'=>$img]);
    	if($result==true){
    		return 1;
    	}else{
    		return 0;
    	}
    }


   function reviewDelete(Request $req){
   		$id = $req->input('id');
    	$result = review::where('id', $id)->delete();
    	if($result==true){
    		return 1;
    	}else{
    		return 0;
    	}
    }
}
