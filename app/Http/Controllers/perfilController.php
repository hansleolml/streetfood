<?php

namespace StreetFood\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use StreetFood\User;
use StreetFood\Perfil;

class perfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $id =Auth::id();
        $perfil= Perfil::where('id_usuaFO', $id)->get()->first();
        //return $perfil;
        // return view('miperfil',compact('perfil'));
        return view('miperfil')->with(['perfil'=>$perfil]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crearperfil');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perfil= new Perfil();
        $perfil->id_usuaFO=Auth::id();
        $perfil->sexo=$request->get('sexo');
        $perfil->username=$request->get('username');
        $perfil->estudios=$request->get('estudios');
        $perfil->fechaNac=$request->get('fechaNac');
        $perfil->experiencia=$request->get('experiencia');
        $perfil->save();
        
        $id =Auth::id();
        $user= User::find($id);
        $user->name=$request->get('nombre');
        $user->apellidos=$request->get('apellido');
        $user->save();


        return redirect('miperfil')->with('status','El perfil fue creado con exito! :D');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perfil= Perfil::find($id);
        return view('editperfil',compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $perfil= Perfil::find($id);
        $perfil->id_usuaFO=Auth::id();
        $perfil->sexo=$request->get('sexo');
        $perfil->username=$request->get('username');
        $perfil->estudios=$request->get('estudios');
        $perfil->fechaNac=$request->get('fechaNac');
        $perfil->experiencia=$request->get('experiencia');
        $perfil->save();

        $id =Auth::id();
        $user= User::find($id);
        $user->name=$request->get('nombre');
        $user->apellidos=$request->get('apellido');
        $user->save();
        return redirect('miperfil')->with('status','La categoria fue editada con exito! :D');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
