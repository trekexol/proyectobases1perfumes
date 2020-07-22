<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productor;
use App\Variable_Formula;
use App\Variable;
use App\Escala;
use DB;

class CriterioAnualController extends Controller
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
    public function create($id)
    {
        $productor = productor::findOrFail($id);
         return \view('Empresa.Modulos.Formula.Inicial.create_formula_anual', \compact('productor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $variable = new Variable();
        $variable->nombre = ($request->get('nombre_criterio'));
        $variable->etiqueta = ($request->get('etiqueta_criterio'));
        $variable->descripcion = ($request->get('descripcion_criterio'));
        $variable->save();

        $formula = new Variable_Formula();
        $formula->fecha_inicial = date('d-m-Y', \strtotime("now"));
        $formula->peso = ($request->get('peso'));
        $formula->id_productor = $id;
        $formula->tipo_formula = 'Inicial';
        $formula->id_variable = $variable->id;
        $formula->save();

        $criterio = new Variable();
        $criterio->nombre = ($request->get('nombre_criterio_exito'));
        $criterio->etiqueta = ($request->get('etiqueta_criterio_exito'));
        $criterio->descripcion = ($request->get('descripcion_criterio_exito'));
        $criterio->save();

        $formula_exito = new Variable_Formula();
        $formula_exito->fecha_inicial = date('d-m-Y', \strtotime("now"));
        $formula_exito->peso = ($request->get('peso_exito'));
        $formula_exito->id_productor = $id;
        $formula_exito->tipo_formula = 'Anual';
        $formula_exito->id_variable = $criterio->id;
        $formula_exito->save();


        return \redirect('productores/'.$id.'/formulas')->with('success', 'Formula creada Correctamente');
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
