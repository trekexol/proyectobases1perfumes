<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Response;


use App\Otros_Ingredientes;  
use App\Otros_Materia;  
use App\materia_ingredientes;  
use App\Materia_Esencia;  
use App\Proveedor;  


class Otros_IngredientesController extends Controller
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
            return \view('Otros_Ingredientes.index', \compact('vars'));
        } 
        else if ($name != '') {
            $vars = Otros_Ingredientes::OrderBy('id')
            ->name($name)
            ->paginate(5);

            return \view('Otros_Ingredientes.index', \compact('vars'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        
        $materia = Materia_Esencia::all();

        $proveedor = Proveedor::all();
       
        return \view('Otros_Ingredientes.create', \compact('materia','proveedor'));
    

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $var = new Otros_Ingredientes();
        $var->nombre = $request->get('nombre');
        $var->formula_quimica = $request->get('formula_quimica');
         $var->ipc = $request->get('ipc');
        $var->tsca_cas = $request->get('tsca_cas');

        if ($request->get('proveedor') == 0) {
            return \redirect('ingredientes/create')->with('message', 'No se pudo guardar el proveedor, intente nuevamente');
       
           
            } else {
                $var->id_proveedor = $request->get('proveedor');
            }

        
       $var->save();

      
        $materia = $request->get('materia');

        if ($materia) {
            for ($i=0; $i < count($materia); $i++) { 
                    $pp = new Otros_Materia();
                    $pp->id_otros_ingredientes = $var->id;
                    $pp->id_materia_esencia = $materia[$i];
                    $pp->save();
                    
                   
           } 
           
        }else {
            return \redirect('ingredientes')->with('message', 'No se pudo guardar la materia, intente nuevamente');
        }

       

        
        
        return \redirect('ingredientes')->with('success', 'Operacion Exitosa');
     
       
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
        $var = Otros_Ingredientes::findOrFail($id);

         
        $materia = Materia_Esencia::all();

        $proveedor = Proveedor::all();
       
        return \view('Otros_Ingredientes.update', \compact('var','materia','proveedor'));
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
        $var = Otros_Ingredientes::findOrFail($id);
        $var->nombre = $request->nombre;
        $var->formula_quimica = $request->formula_quimica;
        $var->update();

        $materia = $request->get('materia');

        if ($materia) {
            for ($i=0; $i < count($materia); $i++) { 
                    $pp = new Otros_Materia();
                    $pp->id_otros_ingredientes = $var->id;
                    $pp->id_materia_esencia = $materia[$i];
                    $pp->save();
                    
                   
           } 
           
        }
        return \redirect('ingredientes')->with('success', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Otros_Ingredientes::findOrFail($id)->delete();
        return \redirect('ingredientes')->with('success', 'Eliminado Correctamente');
    }
}
