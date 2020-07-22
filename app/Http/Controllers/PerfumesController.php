<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Response;


use App\Perfumes;  
use App\Esencia_Perfume;  
use App\Familia_Olfativa; 
use App\Perfume_Familia;  
use App\Perfumista;  

use App\Perfumista_perfume;
use App\Perfume_Ingrediente;  
use App\Otros_Ingredientes;  
use App\Intensidad_Aromatica;  


use App\Perfume_Notas;  
use App\Perfume_Monolitica;  



use App\Productor;  

class PerfumesController extends Controller
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
            return \view('Perfumes.index', \compact('vars'));
        } 
        else if ($name != '') {
            $vars = Perfumes::OrderBy('id')
            ->name($name)
            ->paginate(5);

            return \view('Perfumes.index', \compact('vars'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $perfumista = Perfumista::all();
        $esencia = Esencia_Perfume::all();
        $familia = Familia_Olfativa::all();
        $productor = Productor::all();
        $ingrediente = Otros_Ingredientes::all();
       
        return \view('Perfumes.create', \compact('perfumista','productor','esencia','ingrediente','familia'));
    

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $var = new Perfumes();
        $var->nombre = $request->get('nombre');

        $estructura = $request->get('estructura');
        if($estructura == '2'){
        $var->tipo = 'Monolitica';
        }else{
            $var->tipo = 'Notas';
        }

         $var->genero = $request->get('genero');
        $var->recomendacion = $request->get('recomendacion');

        if ($request->get('productor') == 0) {
            return \redirect('perfume/create')->with('message', 'No se pudo guardar el productor, intente nuevamente');
       
           
            } else {
                $var->id_productor = $request->get('productor');
            }
       
      
       $var->save();

        

       $var2 = new Intensidad_Aromatica();
        $var2->id_perfume = $var->id;
        $var2->tipo = $request->get('tipo_intensidad');
         $var2->iniciales = $request->get('iniciales_intensidad');
        $var2->concentracion = $request->get('concentracion_intensidad');
        $var2->descripcion = $request->get('descripcion_intensidad');

       
      
       $var2->save();

       $esencia = $request->get('esencia');
       
       if($estructura != '2'){
            $salidas = $request->get('salidas');
            if($salidas){
                    for ($i=0; $i < count($salidas); $i++) { 
                                
                                    
                        $pp = new Perfume_Notas();
                        $pp->id_perfume = $var->id;
                        $pp->id_esencia = $salidas[$i];
                        $pp->tipo = 'Salida';
                        $pp->save();


                        } 
                    }
                    $fondos = $request->get('fondos');
                    if($fondos){
                            for ($i=0; $i < count($fondos); $i++) { 
                                        
                                            
                                $pp = new Perfume_Notas();
                                $pp->id_perfume = $var->id;
                                $pp->id_esencia = $fondos[$i];
                                $pp->tipo = 'Fondo';
                                $pp->save();
        
        
                                } 
                            }
                            $corazon = $request->get('corazon');
                            if($corazon){
                                    for ($i=0; $i < count($corazon); $i++) { 
                                                
                                                    
                                        $pp = new Perfume_Notas();
                                        $pp->id_perfume = $var->id;
                                        $pp->id_esencia = $corazon[$i];
                                        $pp->tipo = 'Corazon';
                                        $pp->save();
                
                
                                        } 
                                    }
       
       
       }else{
            //AGREGAR ESENCIAS MONOLITCAS
            for ($i=0; $i < count($esencia); $i++) { 
                
                    
                $pp = new Perfume_Monolitica();
                $pp->id_perfume = $var->id;
                $pp->id_esencia = $esencia[$i];
                $pp->save();
        
       
                } 
       }


       

       

        $familia = $request->get('familia');

        if ($familia) {
            for ($i=0; $i < count($familia); $i++) { 
                $pp = new Perfume_Familia();
                $pp->id_perfume = $var->id;
                $pp->id_familia = $familia[$i];
                $pp->save();
           
            } 
         
         }else {
            return \redirect('perfume')->with('message', 'No se pudo guardar la familia olfativa, intente nuevamente');
        }

           $perfumista = $request->get('perfumista');

        if ($perfumista) {
            for ($i=0; $i < count($perfumista); $i++) { 
                $pp = new Perfumista_Perfume();
                $pp->id_perfume = $var->id;
                $pp->id_perfumista = $perfumista[$i];
                $pp->save();
           } 
           
        }else {
            return \redirect('perfume')->with('message', 'No se pudo guardar el Perfumista, intente nuevamente');
        }

        $ingrediente = $request->get('ingrediente');

        if ($ingrediente) {
            for ($i=0; $i < count($ingrediente); $i++) { 
                $pp = new Perfume_Ingrediente();
                $pp->id_perfume = $var->id;
                $pp->id_otros_ingredientes = $ingrediente[$i];
                $pp->save();
           } 
           
         }else {
            return \redirect('perfume')->with('message', 'No se pudo guardar el Ingrediente, intente nuevamente');
        }

        
        return \redirect('perfume-presentacion/'.$var->id.'/'.$var2->id.'/create')->with('message', 'Operacion Exitosa');
     
       
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
        $var = Perfumes::findOrFail($id);
        return \view('Perfumes.update', \compact('var'));
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
        $var = Perfumes::findOrFail($id);
        $var->nombre = $request->nombre;
        $var->tipo = $request->tipo;
        $var->update();
        return \redirect('perfume')->with('success', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Perfumes::findOrFail($id)->delete();
        return \redirect('perfume')->with('success', 'Eliminado Correctamente');
    }
}
