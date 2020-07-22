<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Response;


use App\Familia_Olfativa;  
use App\Palabra_Clave; 
use App\Palabra_Familia;   


use App\pais;
use App\asociacion_nacional;
use App\productor;

class Familia_OlfativaController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->get('buscar');

        if ($name == '') {
            $vars = null;
            return \view('Familia_Olfativa.index', \compact('vars'));
        } 
        else if ($name != '') {
            $vars = Familia_Olfativa::OrderBy('id')
            ->name($name)
            ->paginate(3);

            return \view('Familia_Olfativa.index', \compact('vars'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // return \view('Familia_Olfativa.create');

      // $pais = pais::all();
        //$asociaciones = asociacion_nacional::all();
        $palabra = Palabra_Clave::all();
       // $palabra = Palabra_Clave::all();
       
        return \view('Familia_Olfativa.create', \compact('palabra'));
    

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productor = new Familia_Olfativa();
        $productor->nombre = $request->get('nombre');
        $productor->descripcion = $request->get('descripcion');
       
      
       $productor->save();

      

        $palabra = $request->get('palabra');

        if ($palabra) {
            for ($i=0; $i < count($palabra); $i++) { 
                $pp = new Palabra_Familia();
                $pp->id_familia = $productor->id;
                $pp->id_palabra = $palabra[$i];
                $pp->save();
           }

           return \redirect('familia-olfativa/')->with('success', 'Operacion Exitosa');
        } else {
            return \redirect('familia-olfativa/create')->with('message', 'No se pudo guardar el pais, intente nuevamente');
        }
           
       
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


    public function buscar(Request $request)
    {
        $administrador = DB::table('var')->where('nombre', $request->nombre)->first();
		

		if(count($administrador) != 0){

		
		}else{ 

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
        $var = Familia_Olfativa::findOrFail($id);
        return \view('Familia_Olfativa.update', \compact('var'));
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
        $var = Familia_Olfativa::findOrFail($id);
        $var->nombre = $request->nombre;
        $var->descripcion = $request->descripcion;
        $var->update();
        return \redirect('familia-olfativa')->with('success', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Familia_Olfativa::findOrFail($id)->delete();
        return \redirect('familia-olfativa')->with('success', 'Eliminado Correctamente');
    }
}
