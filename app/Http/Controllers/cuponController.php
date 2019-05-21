<?php

namespace StreetFood\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use StreetFood\Producto;
use StreetFood\User;
use StreetFood\Cupon;
use StreetFood\Reserva;     

class cuponController extends Controller
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
        $id = Auth::id();
        $cupon= Cupon::where('id_chef',$id)->paginate();
        return view('miscupones')->with(['cupon'=>$cupon])->with(['producto'=>$producto]);
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
        $cupon= new Cupon();
        $id = Auth::id();
        $cupon->id_chef=$id;
        $cupon->id_produFO=$request->get('id_produFO');
        $cupon->descuento=$request->get('descuento');
        $cupon->codigo=$request->get('codigo');
        $cupon->cantidad=$request->get('cantidad');
        $cupon->save();
        return back()->with('status','El cupon fue creado con exito! :D');
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
        $cupon= Cupon::find($id);
        return view('cuponedit',compact('cupon'));
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
        $cupon= Cupon::find($id);
        $cupon->descuento=$request->get('descuento');
        $cupon->codigo=$request->get('codigo');
        $cupon->cantidad=$request->get('cantidad');
        $cupon->save();
        return redirect('miscupones')->with('status', "El cupon fue editado con exito! :D");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Cupon = Cupon::find($id);
        $Cupon->delete();
        return redirect('miscupones')->with('delprodu','El cupon fue eliminado');
    }
}
