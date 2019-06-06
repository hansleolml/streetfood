<?php

namespace StreetFood\Http\Controllers;

use Illuminate\Http\Request;
use StreetFood\Reserva;

class reporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('misreportes');
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
        return view('misreportes')->with(['reserva'=>$reserva]);   
    }
    public function reporte_1($id)
    {
        //
    }
    public function reporte_31($id)
    {
        //
    }
}
