<?php

namespace StreetFood\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use StreetFood\User;
use StreetFood\Perfil;
use StreetFood\Reserva;
use StreetFood\Comentario;

class comentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idcliente = Auth::id();
        $Comentario= new Comentario();
        $Comentario->comentario=$request->get('comentario');
        $Comentario->id_reservaFO=$request->get('id_reservaFO');
        $Comentario->id_chefFO=$request->get('id_chefFO');
        $Comentario->id_clienteFO=$idcliente;
        $Comentario->save();
        
        return back()->with('status','El comentario fue realizado con exito! :D');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuarios= User::all();
        $comentario= Comentario::where('id_chefFO', $id)->get();
        $user= User::where('id', $id)->get()->first();
        $perfil= Perfil::where('id_usuaFO', $id)->get()->first();
        $idcliente = Auth::id();
        $reviews= Reserva::where('id_chefFO', $id)->get();
        $reserva= Reserva::where('id_chefFO', $id)->where('id_clienteFO', $idcliente)->get();
        //return compact('perfil');
        return view('verperfil',compact('perfil'),compact('user'))->with(['reviews'=>$reviews])->with(['reserva'=>$reserva])->with(['comentario'=>$comentario])->with(['usuarios'=>$usuarios]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Comentario = Comentario::find($id);
        $Comentario->delete();
        return back()->with('delprodu','El Comentario fue eliminado');
    }
}
