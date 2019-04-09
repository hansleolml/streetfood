<?php

namespace StreetFood\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use StreetFood\Producto;
use StreetFood\User;

class indexController extends Controller
{
    public function index()
    {
    	if (Auth::check()) {

    		$producto= Producto::all();
            $user= User::all();
            //$question= Question::with('users')->where('usuario.status','=',0)->get();
            //$question= Question::with('users')->get();
    		return view('index')->with(['producto'=>$producto])->with(['user'=>$user]);
    	}
    	else{	
        	return view('entrar');
    	}
    }
}
