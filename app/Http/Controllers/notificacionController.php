<?php

namespace StreetFood\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use StreetFood\Notificacion;
use StreetFood\User;

class notificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $notificacion= Notificacion::where('id_receptor',$id)->orderBy('id', 'DESC')->paginate();
        return view('misnotificaciones')->with(['notificacion'=>$notificacion]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       if($request->ajax()){
        return "hola";
       }
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
        $notificacion= Notificacion::find($id);
        $aviso="";
        $notificacion->visto=$request->get('visto');
        if ($request->get('visto')=='0') {
            $aviso = "La notificación fue marcada como no vista";
        }
        else if ($request->get('visto')=='1') {
            $aviso = "La notificación fue marcada como vista";
        }
        //return $notificacion->visto;
        $notificacion->visto=$request->get('visto');
        $notificacion->save();
        return redirect('misnotificaciones')->with('status',$aviso);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Notificacion = Notificacion::find($id);
        $Notificacion->delete();
        return redirect('misnotificaciones')->with('delprodu','La Notificacion fue eliminada');
    }
}
