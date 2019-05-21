<?php

namespace StreetFood\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use StreetFood\Reserva;
use StreetFood\User;
use StreetFood\Producto;
use StreetFood\Cupon;
use StreetFood\Notificacion;

class reservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto= Producto::all();
        $cupon= Cupon::all();
        $user= User::all();
        $id = Auth::id();
        $reserva= Reserva::where('id_clienteFO',$id)->paginate();
        return view('misreservas',compact('reserva'))->with(['producto'=>$producto])->with(['user'=>$user])->with(['cupon'=>$cupon]);
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
        $reserva= new Reserva();

        $id = Auth::id();
        $reserva->id_produFO=$request->get('id_produ');
        $reserva->id_chefFO=$request->get('id_chefFO');
        $reserva->id_clienteFO=$id;
        $reserva->cantidad=$request->get('cantidad');
        $reserva->review=$request->get('review');
        $reserva->cupon=$request->get('cupon');
        $reserva->save();
        /*aca se crea la notificación */ 

        $notificacion= new Notificacion();

        $id = Auth::id();
        $nombre = Auth::user()->name;
        $apellidos = Auth::user()->apellidos;
        $notificacion->id_emisor=$id;
        $notificacion->id_receptor=$request->get('id_chefFO');
        $mensaje = "El cliente ".$nombre." ".$apellidos." hiso una reservación de ".$request->get('cantidad')." platos";
        $notificacion->mensaje=$mensaje;
        $notificacion->save();

        return back()->with('status','El producto fue reservado con exito! :D');
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
        $reserva= Reserva::find($id);
        return view('reservaedit',compact('reserva'));
    }

    public function review($id)
    {
        $reserva= Reserva::find($id);
        return view('reviewedit',compact('reserva'));
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
        $reserva= Reserva::find($id);
        if ($request->get('review')!='') {
            $reserva->review=$request->get('review');
            $aviso = "Calificación realizada con exito! :D";
        }
        if ($request->get('cantidad')!='') {
            $reserva->cantidad=$request->get('cantidad');
            $aviso = "El reserva fue editada con exito! :D";
        }
        $reserva->save();
        return redirect('misreservas')->with('status',$aviso);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva = Reserva::find($id);        

        /*aca se crea la notificación */ 

        $notificacion= new Notificacion();

        $id = Auth::id();
        $nombre = Auth::user()->name;
        $apellidos = Auth::user()->apellidos;
        $notificacion->id_emisor=$id;
        $notificacion->id_receptor=$reserva->id_chefFO;
        $mensaje = "El cliente ".$nombre." ".$apellidos." ha cancelado su reservación de ".$reserva->cantidad." platos";
        $notificacion->mensaje=$mensaje;
        $notificacion->save();

        /*se elimina la reserva luego de crear la notificación*/
        $reserva->delete();
        return redirect('misreservas')->with('delprodu','La reserva fue eliminada');
    }
}
