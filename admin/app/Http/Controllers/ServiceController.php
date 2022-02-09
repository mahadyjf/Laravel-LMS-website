<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    function ServiceIndex(){
    	return view('service');
    }
    function GetServiceData(){
    	$result = json_decode(Service::orderBy('id', 'desc')->get());
    	return $result;
    }

     function GetServiceDetails(Request $req){
     	$id = $req->input('id');
    	$result = Service::where('id', $id)->get();
    	return $result;
    }

    function ServiceUpdate(Request $req){
   		$id = $req->input('id');
   		$name = $req->input('name');
   		$des = $req->input('des');
   		$img = $req->input('img');
   		
    	$result = Service::where('id', $id)->update(['service_name'=>$name, 'service_des'=>$des, 'service_img'=>$img]);
    	if($result==true){
    		return 1;
    	}else{
    		return 0;
    	}
    }


    function ServiceAdd(Request $req){
   		
   		$name = $req->input('name');
   		$des = $req->input('des');
   		$img = $req->input('img');
   		
    	$result = Service::insert(['service_name'=>$name, 'service_des'=>$des, 'service_img'=>$img]);
    	if($result==true){
    		return 1;
    	}else{
    		return 0;
    	}
    }


   function ServiceDelete(Request $req){
   		$id = $req->input('id');
    	$result = Service::where('id', $id)->delete();
    	if($result==true){
    		return 1;
    	}else{
    		return 0;
    	}
    }
}
