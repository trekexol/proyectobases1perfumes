<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia_Esencia;

use App\Materia_Familia;
use App\Materia_Origen;
use App\Pais;
use App\Proveedor;
use App\Familia_Olfativa; 
use Validator, Response;
use DB;

class Materia_EsenciaController extends Controller
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
            return \view('Materia_Esencia.index', \compact('vars'));
        } 
        else if ($name != '') {
            $vars = Materia_Esencia::OrderBy('id')
            ->name($name)
            ->paginate(3);

            return \view('Materia_Esencia.index', \compact('vars'));
          }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedor = Proveedor::all();
        $familia = Familia_Olfativa::all();
        $pais = Pais::all();
        return \view('Materia_Esencia.create', \compact('proveedor','familia','pais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vars = new Materia_Esencia();
        $vars->nombre = $request->get('nombre');
        $vars->estado = $request->get('estado');
        $vars->punto_ebullicion = $request->get('punto_ebullicion');
        $vars->ipc = $request->get('ipc');
        $vars->ipc_alter = $request->get('ipc_alter');
        $vars->einecs = $request->get('einecs');
        $vars->tsca_cas = $request->get('tsca_cas');
        $vars->descripcion_visual = $request->get('descripcion_visual');
        $vars->parte = $request->get('parte');
        $vars->naturaleza = $request->get('naturaleza');
        $vars->tipo = $request->get('tipo');
        $vars->solubilidad = $request->get('solubilidad');
        $vars->proceso = $request->get('proceso'); 
        $vars->descproceso = $request->get('descproceso');
        $vars->id_proveedor = $request->get('proveedor');

        $check = request()->validate([
            'nombre' => 'required',
            'estado' => 'required'
        ]);
        
        $vars->save();

        $familia = $request->get('familia');

        if ($familia) {
            for ($i=0; $i < count($familia); $i++) { 
                $pp = new Materia_Familia();
                $pp->id_materia = $vars->id;
                $pp->id_familia = $familia[$i];
                $pp->save();
           
            } 
         
         }else {
            return \redirect('materia-esencia')->with('message', 'No se pudo guardar la familia olfativa, intente nuevamente');
        }

        $origen = $request->get('origen');

        if ($origen) {
            for ($i=0; $i < count($origen); $i++) { 
                $pp = new Materia_Origen();
                $pp->id_materia = $vars->id;
                $pp->id_pais = $origen[$i];
                $pp->save();
           
            } 
        }
        

        return \redirect('materia-esencia')->with('success', 'Guardado Correctamente');
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
        $var = Materia_Esencia::findOrFail($id);
        /* $proveedor = null;DB::table('materia_esencia')
                    ->join('proveedor', 'proveedor.id', '=', 'materia_esencia.id_proveedor')
                    ->select('materia_esencia.*', 'proveedor.nombre as nombre_proveedor')
                    ->paginate(5);*/

                    $proveedor = Proveedor::all();
                    $familia = Familia_Olfativa::all();
                    $pais = Pais::all();
        return \view('Materia_Esencia.update', \compact('var','proveedor','familia','pais'));
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
        $vars = Materia_Esencia::findOrFail($id);
        $vars->nombre = $request->nombre;
        $vars->estado = $request->estado;
        $vars->punto_ebullicion = $request->punto_ebullicion;
        $vars->ipc = $request->ipc;
        $vars->ipc_alter = $request->ipc_alter;
        $vars->einecs = $request->einecs;
        $vars->tsca_cas = $request->tsca_cas;
        $vars->descripcion_visual = $request->descripcion_visual;
        $vars->parte = $request->parte;
        $vars->naturaleza = $request->naturaleza;
        $vars->tipo = $request->tipo;
        $vars->descripcion_visual = $request->descripcion_visual;
        $vars->solubilidad = $request->solubilidad;
        $vars->proceso = $request->proceso; 
        $vars->descproceso = $request->descproceso;
        //$var->id_proveedor = $request->id_proveedor;

        $origen = $request->get('origen');

        if ($origen) {
            for ($i=0; $i < count($origen); $i++) { 
                $pp = new Materia_Origen();
                $pp->id_materia = $vars->id;
                $pp->id_pais = $origen[$i];
                $pp->save();
           
            } 
        }

        $familia = $request->get('familia');

        if ($familia) {
            for ($i=0; $i < count($familia); $i++) { 
                $pp = new Materia_Familia();
                $pp->id_materia = $vars->id;
                $pp->id_familia = $familia[$i];
                $pp->save();
           
            } 
        }
        
        $vars->update();
        return \redirect('materia-esencia')->with('success', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Materia_Esencia::findOrFail($id)->delete();
        return \redirect('materia-esencia')->with('success', 'Eliminado Correctamente');
    }
}
