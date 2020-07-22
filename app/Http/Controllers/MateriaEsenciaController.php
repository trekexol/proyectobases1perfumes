<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pais;
use App\Otros_Ingredientes;
use App\Proveedor;
use App\Origen;
use App\Materia_Esencia;
use App\F_M;
use DB;
use App\Otros_Materia;
class MateriaEsenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pais = pais::all();
        $otros = Otros_Ingredientes::all();
        $proveedores = Proveedor::all();
        $familia = DB::table('familia_olfativa')->paginate();
        return \view('Producto.Ingrediente.create2', \compact('pais', 'otros', 'proveedores', 'familia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $materia = new Materia_Esencia();

        $materia->nombre = $request->get('nombre');
        $materia->descripcion_visual = $request->get('descripcion_visual');
        $materia->punto_ebullicion = $request->get('embullicion');
        $materia->estado = $request->get('estado');
        $materia->ipc = $request->get('ipc');
        $materia->tipo = $request->get('tipo');
        $materia->solubilidad = $request->get('solubilidad');
        $materia->proceso = $request->get('proceso');
        $materia->ipc_alter = $request->get('ipc_alter');
        $materia->einecs = $request->get('einecs');
        $materia->einecs = $request->get('einecs');
        $materia->tsca_cas = $request->get('tsca_cas');
        $materia->parte = $request->get('parte');
        $materia->naturaleza = $request->get('naturaleza');
        $materia->descproceso = $request->get('descproceso');

        $materia->id_proveedor = $request->get('proveedor');
        $materia->save();

        for ($i=0; $i < count($request->get('pais')); $i++) { 
            $origen = new Origen();
            $origen->id_materia = $materia->id;
            $origen->id_pais = $request->get('pais')[$i];
            $origen->save();
        }

        for ($i=0; $i < count($request->get('familia')); $i++) { 
            $fm = new F_M();
            $fm->id_materia = $materia->id;
            $fm->id_familia = $request->get('familia')[$i];
            $fm->save();
        }
        
        for ($i=0; $i < count($request->get('otros')); $i++) { 
            $otros = new Otros_Materia();
            $otros->id_materia_esencia = $materia->id;
            $otros->id_otros_ingredientes = $request->get('otros')[$i];
            $otros->save();
        }
        
        return \redirect('/materia-esencia/create');
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
