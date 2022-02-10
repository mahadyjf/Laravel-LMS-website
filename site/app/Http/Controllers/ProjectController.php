<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
class ProjectController extends Controller
{
  function ProjectPage(){
    $ProjectData = json_decode(project::orderBy('id', 'desc')->get());
    return view('projects', ["ProjectData"=>$ProjectData]);
  }
}
