<?php

namespace StreetFood\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use StreetFood\Producto;
use StreetFood\User;
use StreetFood\Categoria;

class indexController extends Controller
{
    public function index()
    {
    	if (Auth::check()) {
            if(auth()->user()->tipoUser==1){
                $categoria= Categoria::all();
                return view('admin')->with(['categoria'=>$categoria]);
            }
            else{
        		$producto= Producto::where('activo',1)->get();
                $user= User::all();
                $categoria= Categoria::all();
                //$question= Question::with('users')->where('usuario.status','=',0)->get();
                //$question= Question::with('users')->get();
        		return view('index')->with(['producto'=>$producto])->with(['user'=>$user])->with(['categoria'=>$categoria]);
            }
    	}
    	else{	
        	return view('entrar');
    	}
    }
}
