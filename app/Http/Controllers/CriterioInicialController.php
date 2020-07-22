<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productor;
use App\Variable_Formula;
use App\Variable;
use App\Escala;
use DB;
class CriterioInicialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $productor = productor::findOrFail($id);

        $filtro = $request->get('filtro');
        
        if ($filtro == 'vigentes') {
            $inicial = DB::table('variable_formula')->whereNull('fecha_final')->where('id_productor', '=', $id)->where('tipo_formula', '=', 'Inicial')->get()->first();
            $anual = DB::table('variable_formula')->whereNull('fecha_final')->where('id_productor', '=', $id)->where('tipo_formula', '=', 'Anual')->get()->first();
            return \view('Empresa.Modulos.Formula.Inicial.index_formula_inicial', \compact('productor', 'anual', 'inicial') );
        }
        else if ($filtro == 'vencidas') {
            
            $inicial = DB::table('variable_formula')->whereNotNull('fecha_final')->where('id_productor', '=', $id)->where('tipo_formula', '=', 'Anual')->get()->first();
            $anual = DB::table('variable_formula')->whereNotNull('fecha_final')->where('id_productor', '=', $id)->where('tipo_formula', '=', 'Anual')->get()->first();
            return \view('Empresa.Modulos.Formula.Inicial.index_formula_inicial', \compact('productor', 'anual', 'inicial') );
        }
        else if ($filtro == 'todas') {
            $formula = Variable_Formula::all();
            return \view('Empresa.Modulos.Formula.Inicial.index_formula_inicial', \compact('productor', 'formula') );
        }
        else if ($filtro == '') {
            $inicial = null;
            $anual = null;
            
            return \view('Empresa.Modulos.Formula.Inicial.index_formula_inicial', \compact('productor', 'anual', 'inicial') );
        }
            
      

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $productor = productor::findOrFail($id);
        return \view('Empresa.Modulos.Formula.Inicial.create_formula_inicial', \compact('productor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $n_criterios = $request->get('nombre_criterio');

        for ($i=0; $i < count($n_criterios); $i++) { 
            $variable = new Variable();
            $variable->nombre = ($request->get('nombre_criterio'))[$i];
            $variable->etiqueta = ($request->get('etiqueta_criterio'))[$i];
            $variable->descripcion = ($request->get('descripcion_criterio'))[$i];
            $variable->save();

            $formula = new Variable_Formula();
            $formula->fecha_inicial = date('d-m-Y', \strtotime("now"));
            $formula->peso = ($request->get('peso'))[$i];
            $formula->id_productor = $id;
            $formula->tipo_formula = 'Inicial';
            $formula->id_variable = $variable->id;
            $formula->save();
        }

        $criterio = new Variable();
        $criterio->nombre = ($request->get('nombre_criterio_exito'));
        $criterio->etiqueta = ($request->get('etiqueta_criterio_exito'));
        $criterio->descripcion = ($request->get('descripcion_criterio_exito'));
        $criterio->save();

        $formula_exito = new Variable_Formula();
        $formula_exito->fecha_inicial = date('d-m-Y', \strtotime("now"));
        $formula_exito->peso = ($request->get('peso_exito'));
        $formula_exito->id_productor = $id;
        $formula_exito->tipo_formula = 'Inicial';
        $formula_exito->id_variable = $criterio->id;
        $formula_exito->save();

        $escala = new Escala();
        $escala->fecha_inicial = date('d-m-Y', \strtotime("now"));
        $escala->escala_inicial = $request->get('escala_inicial');
        $escala->escala_final = $request->get('escala_final');
        $escala->id_productor = $id;
        $escala->save();

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
