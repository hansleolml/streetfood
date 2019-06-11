<?php

namespace StreetFood\Http\Controllers;

use Illuminate\Http\Request;
use StreetFood\Reserva;
use StreetFood\Producto;
use StreetFood\User;

class reporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $fecha_inicio='';
       $fecha_fin='';
       return view('misreportes',['fecha_inicio'=>$fecha_inicio,'fecha_fin'=>$fecha_fin]);
       //return view('reportesprueba',['fecha_inicio'=>$fecha_inicio,'fecha_fin'=>$fecha_fin]);
    }
    public function pruebareporte()
    {
       return view('reportesprueba');
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
        //
    }
    public function reporte_reservas(Request $request)
    {
        $fecha_inicio=$request->get('fecha_inicio');
        $fecha_fin=$request->get('fecha_fin');
        $reserva= Reserva::whereBetween('created_at', [$fecha_inicio, $fecha_fin])->get();
        $user= User::all();
        $producto= Producto::all();
        // $location =array(fecha_inicio, $fecha_fin);
        // return compact('location');
        return view('misreportes',['fecha_inicio'=>$fecha_inicio,'fecha_fin'=>$fecha_fin])->with(['reserva'=>$reserva])->with(['producto'=>$producto])->with(['user'=>$user]);   
    }
    public function cliente_index()
    {   
        $fecha_inicio='';
        $fecha_fin='';
        return view('misreportes2',['fecha_inicio'=>$fecha_inicio,'fecha_fin'=>$fecha_fin]);
    }
    public function reporte_cliente(Request $request)
    {
        $fecha_inicio=$request->get('fecha_inicio');
        $fecha_fin=$request->get('fecha_fin');
        $reserva= Reserva::whereBetween('created_at', [$fecha_inicio, $fecha_fin])->get();
        $user= User::all();
        $producto= Producto::all();
        // $location =array(fecha_inicio, $fecha_fin);
        // return compact('location');
        return view('misreportes2',['fecha_inicio'=>$fecha_inicio,'fecha_fin'=>$fecha_fin])->with(['reserva'=>$reserva])->with(['producto'=>$producto])->with(['user'=>$user]); 
    }
    public function chef_index()
    {
        $fecha_inicio=$request->get('fecha_inicio');
        $fecha_fin=$request->get('fecha_fin');
        return view('misreporteschef',['fecha_inicio'=>$fecha_inicio,'fecha_fin'=>$fecha_fin]);
    }
    public function reporte_chef(Request $request)
    {
        $fecha_inicio=$request->get('fecha_inicio');
        $fecha_fin=$request->get('fecha_fin');
        $reserva= Reserva::whereBetween('created_at', [$fecha_inicio, $fecha_fin])->get();
        $user= User::all();
        $producto= Producto::all();
        // $location =array(fecha_inicio, $fecha_fin);
        // return compact('location');
        return view('misreporteschef',['fecha_inicio'=>$fecha_inicio,'fecha_fin'=>$fecha_fin])->with(['reserva'=>$reserva])->with(['producto'=>$producto])->with(['user'=>$user]); 
    }
}
