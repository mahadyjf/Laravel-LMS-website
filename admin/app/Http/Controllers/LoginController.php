<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;

class LoginController extends Controller
{
    function LoginIndex(){
    	return view('login');
    }
    function onLogin(Request $req){
    	$user = $req->input('user');
    	$pass = $req->input('pass');

    	$result = admin::where('username', $user)->where('password', $pass)->count();
    	if($result == true){
    		$req->session()->put('user', $user);
    		return 1;
    	}else{
    		return 0;
    	}
    }

    function onLogOut(Request $req){
    	$req->session()->flush();
    	return redirect('/loginpage');
    }
}
