<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;

class ContactController extends Controller
{
     function ContactIndex(){
    	return view('Contact');
    }

    function GetContactData(){
    	$result = json_decode(contact::orderBy('id', 'desc')->get());
    	return $result;
    }


   function ContactDelete(Request $req){
   		$id = $req->input('id');
    	$result = contact::where('id', $id)->delete();
    	if($result==true){
    		return 1;
    	}else{
    		return 0;
    	}
    }
}
