<?php

namespace StreetFood\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use StreetFood\Reserva;
use StreetFood\User;
use StreetFood\Producto;


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
        $user= User::all();
        $reserva= Reserva::orderby('id','ASC')->paginate();
        return view('misreservas',compact('reserva'))->with(['producto'=>$producto])->with(['user'=>$user]);
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
        $reserva->id_clienteFO=$id;
        $reserva->cantidad=$request->get('cantidad');
        $reserva->review=$request->get('review');
        $reserva->save();
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
        $reserva->delete();
        return redirect('misreservas')->with('delprodu','La reserva fue eliminada');
    }
}
