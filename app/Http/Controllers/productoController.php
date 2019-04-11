<?php

namespace StreetFood\Http\Controllers;

use StreetFood\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class productoController extends Controller
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
        // dd($request->tituProdu);
        // $this->validate($request,
        //     //reglas
        //     ['tituProdu' => 'required|max:50',
        //     'etikProdu' => 'required|max:50',
        //     'locality' => 'max:30',],
        //     //mensaje
        //     ['tituProdu.required' => 'El titulo es requerido',
        //     'tituProdu.max' => 'El titulo no debe ser mayor a 50 caracteres',
        //     'etikProdu.required' => 'Al menos una etiqueta es requerida',
        //     'etikProdu.max' => 'El numero de caracteres de este campo no debe ser mayor a 50',
        //     'locality.max' => 'El numero de caracteres de este campo no debe ser mayor a 30',]);

        $producto= new Producto();

        $id = Auth::id();

        $etiquetget=$request->get('etikProdu');//consigo etik1,etike2
        $etiquetas = explode(",", $etiquetget);//lo vuelvo un arreglo
        $tamEti=count($etiquetas);//nro elementos arreglo



        $producto->id_usuarioFO=$id;
        $producto->tituProdu=$request->get('tituProdu');
        $producto->ingredientes=$request->get('ingredientes');
        $producto->promocion=$request->get('promocion');
        $producto->precio=$request->get('precio');
        $producto->cantidad=$request->get('cantidad');

        for ($i=1; $i <=$tamEti ; $i++) { //añade las etiquetas segun el numero
            $nr=$i-1;
            $frase="etiket".$i;
            $producto->$frase=$etiquetas[$nr];
        
        }

        $producto->localidad=$request->get('locality');
        $producto->save();
        
        return back();
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
        $producto = Producto::find($id);
        $producto->delete();
        return back()->with('info','El producto fue eliminado');
    }
}
