<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Palabra_Clave;
use App\Palabra_Familia;
use App\Familia_Olfativa;
use App\Pais;
use App\Asociacion_Nacional;
use Validator, Response;
use DB;

use Illuminate\Support\Facades\Log;

class Palabra_ClaveController extends Controller
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
            return \view('Palabra_Clave.index', \compact('vars'));
        } 
        else if ($name != '') {
            $vars = Palabra_Clave::OrderBy('id')
            ->name($name)
            ->paginate(3);

            return \view('Palabra_Clave.index', \compact('vars'));
          }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return \view('Palabra_Clave.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vars = new Palabra_Clave();
        $vars->nombre = $request->get('nombre');
       
        
        
        $check = request()->validate([
            'nombre' => 'required'
            
        ]);

         
        $vars->save();

        
        return \redirect('palabra-clave')->with('success', 'Registrado correctamente');
   
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
        $var = Palabra_Clave::findOrFail($id);
        return \view('Palabra_Clave.update', \compact('var'));
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
        $var = Palabra_Clave::findOrFail($id);
        $var->nombre = $request->nombre;
       
        $var->update();
        return \redirect('palabra-clave')->with('success', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Palabra_Clave::findOrFail($id)->delete();
        return \redirect('palabra-clave')->with('success', 'Eliminado Correctamente');
    }
}
