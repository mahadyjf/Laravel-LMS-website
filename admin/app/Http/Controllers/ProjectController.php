<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
class ProjectController extends Controller
{
    function ProjectIndex(){
    	return view('Projects');
    }

    function GetProjectData(){
    	$result = json_decode(project::orderBy('id', 'desc')->get());
    	return $result;
    }

     function GetProjectDetails(Request $req){
     	$id = $req->input('id');
    	$result = project::where('id', $id)->get();
    	return $result;
    }

    function ProjectUpdate(Request $req){
   		$id = $req->input('id');
   		$name = $req->input('name');
   		$des = $req->input('des');
   		$link = $req->input('link');
   		$img = $req->input('img');
   		
    	$result = project::where('id', $id)->update(['project_name'=>$name, 'project_des'=>$des, 'project_link'=>$link, 'project_img'=>$img]);
    	if($result==true){
    		return 1;
    	}else{
    		return 0;
    	}
    }


    function ProjectAdd(Request $req){
   		
   		$name = $req->input('name');
   		$des = $req->input('des');
   		$link = $req->input('link');
   		$img = $req->input('img');
   		
    	$result = project::insert(['project_name'=>$name, 'project_des'=>$des, 'project_link'=>$link, 'project_img'=>$img]);
    	if($result==true){
    		return 1;
    	}else{
    		return 0;
    	}
    }


   function ProjectDelete(Request $req){
   		$id = $req->input('id');
    	$result = project::where('id', $id)->delete();
    	if($result==true){
    		return 1;
    	}else{
    		return 0;
    	}
    }
}
