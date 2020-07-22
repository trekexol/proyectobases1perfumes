<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Response;


use App\Perfumes;  
use App\Esencia_Perfume;  

use App\Esencia_Familia;  
use App\Familia_Olfativa; 

use App\Perfume_Notas;  
use App\Perfume_Monolitica;  


use DB;


class Esencia_PerfumeController extends Controller
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
            return \view('Esencia_Perfume.index', \compact('vars'));
        } 
        else if ($name != '') {
            $vars = Esencia_Perfume::OrderBy('tsca_cas')
            ->name($name)
            ->paginate(5);

            return \view('Esencia_Perfume.index', \compact('vars'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
       
        $familia = Familia_Olfativa::all();
       
        return \view('Esencia_Perfume.create', \compact('familia'));
    

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $var = new Esencia_Perfume();
        $var->tsca_cas = $request->get('tsca_cas');
        $var->nombre = $request->get('nombre');
        $var->tipo = $request->get('tipo');
         $var->descripcion = $request->get('descripcion');
        

       
      
       $var->save();

        

      

       

        $familia = $request->get('familia');

        if ($familia) {
            for ($i=0; $i < count($familia); $i++) { 
                $pp = new Esencia_Familia();
                $pp->id_esencia_perfume = $var->tsca_cas;
                $pp->id_familia = $familia[$i];
                $pp->save();
           
            } 
         
         }else {
            return \redirect('esencia')->with('success', 'No se pudo guardar la familia olfativa, intente nuevamente');
        }

         

        
        
        return \redirect('esencia')->with('success', 'Esencia Registrada');
     
       
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
    public function edit($tsca_cas)
    {
        $var = Esencia_Perfume::findOrFail($tsca_cas);
        $esencia_familia = Familia_Olfativa::all();
       /* $esencia_familia = DB::table('familia_olfativa')
        ->join('f_e', 'f_e.id_familia', '=', 'familia_olfativa.id')
        ->join('esencia_perfume', 'esencia_perfume.tsca_cas', '=', 'f_e.id_esencia_perfume')
        ->where('esencia_perfume.tsca_cas', '=', $tsca_cas)
        ->select('familia_olfativa.*')
        ->paginate(10);*/

        return \view('Esencia_Perfume.update', \compact('var','esencia_familia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tsca_cas)
    {
        $var = Esencia_Perfume::findOrFail($tsca_cas);
        $var->nombre = $request->nombre;
        $var->tipo = $request->tipo;
        $var->update();

        $familia = $request->get('esencia_familia');

        if ($familia) {
            for ($i=0; $i < count($familia); $i++) { 
                $pp = new Esencia_Familia();
                $pp->id_esencia_perfume = $var->tsca_cas;
                $pp->id_familia = $familia[$i];
                $pp->save();
           
            } 
        }
        return \redirect('esencia')->with('success', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tsca_cas)
    {
        $delete = Esencia_Perfume::findOrFail($tsca_cas)->delete();
        return \redirect('esencia')->with('success', 'Eliminado Correctamente');
    }
}
