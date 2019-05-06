<?php

namespace StreetFood\Http\Controllers;

use StreetFood\Producto;
use StreetFood\Reserva;
use StreetFood\User;
use StreetFood\Categoria;
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
        if (Auth::check()) {

            $producto= Producto::all();
            $user= User::all();
            $reserva= Reserva::all();
            //$question= Question::with('users')->where('usuario.status','=',0)->get();
            //$question= Question::with('users')->get();
            return view('reservar')->with(['producto'=>$producto])->with(['user'=>$user])->with(['reserva'=>$reserva]);
        }
        else{   
            return view('entrar');
        }
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


        $producto->categoria=$request->get('categoria');
        $producto->id_usuarioFO=$id;
        $producto->tituProdu=$request->get('tituProdu');
        $producto->ingredientes=$request->get('ingredientes');
        $producto->promopide=$request->get('promopide');
        $producto->promolleva=$request->get('promolleva');
        $producto->precio=$request->get('precio');
        $producto->cantidad=$request->get('cantidad');

        for ($i=1; $i <=$tamEti ; $i++) { //añade las etiquetas segun el numero
            $nr=$i-1;
            $frase="etiket".$i;
            $producto->$frase=$etiquetas[$nr];
        
        }

        $producto->localidad=$request->get('locality');
        $producto->save();
        
        return back()->with('status','El producto fue creado con exito! :D');
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
        $categoria= Categoria::all();
        $producto= Producto::find($id);
        return view('editar',compact('producto'))->with(['categoria'=>$categoria]);
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
         $producto= Producto::find($id);

        $id = Auth::id();

        $etiquetget=$request->get('etikProdu');//consigo etik1,etike2
        $etiquetas = explode(",", $etiquetget);//lo vuelvo un arreglo
        $tamEti=count($etiquetas);//nro elementos arreglo


        $producto->categoria=$request->get('categoria');
        $producto->id_usuarioFO=$id;
        $producto->tituProdu=$request->get('tituProdu');
        $producto->ingredientes=$request->get('ingredientes');
        $producto->promopide=$request->get('promopide');
        $producto->promolleva=$request->get('promolleva');
        $producto->precio=$request->get('precio');
        $producto->cantidad=$request->get('cantidad');

        for ($i=1; $i <=$tamEti ; $i++) { //añade las etiquetas segun el numero
            $nr=$i-1;
            $frase="etiket".$i;
            $producto->$frase=$etiquetas[$nr];
        
        }

        $producto->localidad=$request->get('locality');
        $producto->save();
        
        return redirect('')->with('status','El producto fue editado con exito! :D');
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
        return back()->with('delprodu','El producto fue eliminado');
    }
}
