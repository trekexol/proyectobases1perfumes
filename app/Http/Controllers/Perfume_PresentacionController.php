<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Response;


use App\Intensidad_Aromatica;  
use App\Perfume_Presentacion;  
use App\Perfumes;  
use App\Proveedor;  


use DB;


class Perfume_PresentacionController extends Controller
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
            return \view('Perfume_Presentacion.index', \compact('vars'));
          // return \redirect('perfume-presentacion/'.$id_perfume.'/'.$id_intensidad.'')->with('message', 'Operacion Exitosa');
     
        } 
        else if ($name != '') {
            $vars = Perfume_Presentacion::OrderBy('id')
            ->name($name)
            ->paginate(5);

            return \view('Perfume_Presentacion.index', \compact('vars'));
        }
    }

    public function menu(Request $request,$id_perfume,$id_intensidad)
    {
       
             $perfume = Perfumes::findOrFail($id_perfume);
             $intensidad = Intensidad_Aromatica::findOrFail($id_intensidad);
           
            $vars = DB::table('presentacion_perfume')
            ->join('intensidad_aromatica', 'intensidad_aromatica.id_perfume', '=', 'presentacion_perfume.fk_id_perfume')
            ->orWhere('presentacion_perfume.fk_id_perfume', '=', $id_perfume)
            ->select('presentacion_perfume.*', 'intensidad_aromatica.tipo as tipo')
            ->paginate(5);

          //  return \view('Perfume_Presentacion.index');
            return \view('Perfume_Presentacion.index', \compact('vars','perfume','intensidad'));
        
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_perfume,$id_intensidad)
    {
       
        $perfume = Perfumes::findOrFail($id_perfume);
        $intensidad = $id_intensidad;
       
        return \view('Perfume_Presentacion.create', \compact('perfume','intensidad'));
        
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id_perfume,$id_intensidad)
    {
        $var = new Perfume_Presentacion();
        $var->cantidad = $request->get('cantidad');
        if($request->get('volumen') != '1'){
        $var->volumen = $request->get('volumen');
        }else{
            $var->volumen = $request->get('volumen_otro');
        }

        $var->fk_id_perfume = $id_perfume;
        $var->fk_id_intensidad = $id_intensidad;
        
       $var->save();


        
        
       return \redirect('perfume-presentacion/'.$var->fk_id_perfume.'/'.$var->fk_id_intensidad.'/create')->with('message', 'Operacion Exitosa');
     
       
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
        $administrador = DB::table('var')->where('cantidad', $request->cantidad)->first();
		

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
    public function edit($id_perfume,$id_intensidad)
    {
        $var = Perfume_Presentacion::findOrFail($id);
        return \view('Perfume_Presentacion.update', \compact('var'));
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
        $var = Perfume_Presentacion::findOrFail($id);
        $var->cantidad = $request->cantidad;
        $var->volumen = $request->volumen;
        $var->update();
        return \redirect('ingredientes')->with('success', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_perfume,$id_intensidad)
    {
        $delete = Perfume_Presentacion::findOrFail($id)->delete();
        return \redirect('ingredientes')->with('success', 'Eliminado Correctamente');
    }
}
