<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\photo;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    function PhotoIndex(){
    	return view('photo');
    }

    function photoJson(){
    	return photo::take(4)->get();
    }

    function photoJsonByID(Request $req){
    	$FirstId = $req->id;
    	$LastId = $FirstId+4;
    	
    	return photo::where('id', '>', $FirstId)->where('id', '<=', $LastId)->get();
    }

    function PhotoUpload(Request $req){
    	$photoPath = $req->file('photo')->store('public');

    	$photoName = (explode('/', $photoPath))[1];
    	$host=$_SERVER['HTTP_HOST'];
    	$location = $host."/storage/".$photoName;

    	 $result = photo::insert(['location'=> $location]);
    	return $result;
    }

    function photoDelete(Request $request){
    	$OldPhotoURL = $request->input('OldPhotoURL');
    	$OldPhotoID = $request->input('id');

    	$OldPhotoURLArray = explode("/", $OldPhotoURL);
    	$OldPhotoName = end($OldPhotoURLArray);
    	$DeletePhotoFile = Storage::delete('public/'.$OldPhotoName);

    	$DeleteRow = photo::where('id', $OldPhotoID)->delete();
    	return $DeleteRow;
    }


}
