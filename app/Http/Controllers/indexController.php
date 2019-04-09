<?php

namespace StreetFood\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use StreetFood\Publicacion;
use StreetFood\User;

class indexController extends Controller
{
    public function index()
    {
    	if (Auth::check()) {

    		$question= Publicacion::all();
            $user= User::all();
            //$question= Question::with('users')->where('usuario.status','=',0)->get();
            //$question= Question::with('users')->get();
    		return view('index')->with(['question'=>$question])->with(['user'=>$user]);
    	}
    	else{	
        	return view('entrar');
    	}
    }
}
