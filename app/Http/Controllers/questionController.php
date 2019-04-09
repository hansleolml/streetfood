<?php

namespace StreetFood\Http\Controllers;

use StreetFood\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class questionController extends Controller
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
        // dd($request->tituPregu);
        $this->validate($request,
            //reglas 
            ['tituPregu' => 'required|max:50',
            'etikPregu' => 'required|max:50',
            'alterPregu1' => 'required|min:2',
            'locality' => 'max:30',],
            //mensaje
            ['tituPregu.required' => 'El titulo es requerido',
            'tituPregu.max' => 'El titulo no debe ser mayor a 50 caracteres',
            'etikPregu.required' => 'Al menos una etiqueta es requerida',
            'etikPregu.max' => 'El numero de caracteres de este campo no debe ser mayor a 50',
            'alterPregu1.required' => 'Al menos una alternativa es requerida',
            'alterPregu1.min' => 'Este campo debe tener almenos 2 caracteres',
            'locality.max' => 'El numero de caracteres de este campo no debe ser mayor a 30',]);

        $question= new Question();

        $id = Auth::id();

        $etiquetget=$request->get('etikPregu');//consigo etik1,etike2
        $etiquetas = explode(",", $etiquetget);//lo vuelvo un arreglo
        $tamEti=count($etiquetas);//nro elementos arreglo



        $question->id_usuarioFO=$id;
        $question->tituloquest=$request->get('tituPregu');
        $question->precio=$request->get('precio');
        $question->opinion=$request->get('myopinion');
        $question->alias=$request->get('alias');

        for ($i=1; $i <=$tamEti ; $i++) { //añade las etiquetas segun el numero
            $nr=$i-1;
            $frase="etiket".$i;
            $question->$frase=$etiquetas[$nr];
        
        }
        
        $question->opci1=$request->get('alterPregu1');
        $question->opci2=$request->get('alterPregu2');
        $question->opci3=$request->get('alterPregu3');
        $question->opci4=$request->get('alterPregu4');
        $question->opci5=$request->get('alterPregu5');
        $question->localidad=$request->get('locality');
        $question->save();
        
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
        //
    }
}
