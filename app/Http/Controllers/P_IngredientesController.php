<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presentacion_Ingrediente;
use App\Materia_Esencia;
use App\Otros_Ingredientes;
use DB;

class P_IngredientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingr = Presentacion_Ingrediente::all();
        return \view('Ingredientes.Presentacion_Ingrediente.index', \compact('ingr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mat = Otros_Ingredientes::all();
        //$ingr = Presentacion_Ingrediente::all();
        $otr = null;
        return \view('Ingredientes.Presentacion_Ingrediente.create', \compact('mat', 'otr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //
         //$mat = $request->get('mat');
         $otr = $request->get('otr');
         $ingr = new Presentacion_Ingrediente();
         $ingr->precio = $request->get('precio');
         $ingr->volumen_ml = $request->get('volumen_ml');
    //     $ingr->id_materia = $mat;
         $ingr->id_otros_ingredientes = $otr;

         $ingr->save();

         return \redirect()->action('P_IngredientesController@index')->with('success', 'Ingrediente creado correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    //    $ingr = Presentacion_Ingrediente::findOrFail($id);
       
    //   return \view('Ingredientes.Presentacion_Ingrediente.index', \compact('ingr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pc)
    {
        $ingr = Presentacion_Ingrediente::findOrFail($pc);
        $mat = Materia_Esencia::all();
        $otr = Otros_Ingredientes::all();
       // $pres_mat = Presentacion_Ingrediente::where('id_materia', '=', $mat->id)->first();
       // $pres_otr = Presentacion_Ingrediente::where('id_otros_ingredientes', '=', $otr->id)->first();

        $pres_ingr = DB::table('presentacion_ingrediente')
        ->join('materia_esencia', 'presentacion_ingrediente.id_materia', '=', 'materia_esencia.id')
        ->join('otros_ingredientes', 'presentacion_ingrediente.id_otros_ingredientes', '=', 'otros_ingredientes.id')
        ->where('presentacion_ingrediente.pc', '=', $pc)
        ->select('presentacion_ingrediente.*')
        ->first();

        return \view('Ingredientes.Presentacion_Ingrediente.edit', \compact('ingr', 'mat', 'otr', 'pres_ingr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pc)
    {
        $mat = $request->mat;
        $otr = $request->otr;
        $ingr = Presentacion_Ingrediente::findOrFail($pc);
        $ingr->nombre = $request->precio;
        $ingr->formula_quimica = $request->volumen_ml;
        $ingr->id_materia = $mat;
        $ingr->id_otr = $otr;

       $ingr->update();

        return \redirect('P_IngredientesController@index')->with('success', 'Ingrediente actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pc)
    {
        //
        $delete = Presentacion_Ingrediente::findOrFail($pc)->delete();
        return \redirect('Ingredientes.Presentacion_Ingrediente.index')->with('success', 'Eliminado Correctamente');
    }


    public function stringToNumber($string)
    {
        $number = intval(preg_replace('/[^0-9]+/', '', $string), 10); 
        return $number;
    }

    public function getAreaCode($number)
    {
        $area = intdiv ( $this->stringToNumber($number) ,  10000000000);
        return $area;
    }

    public function getNumber($number)
    {
        $phone = substr($this->stringToNumber($number), -10);
        return $phone;
        
    }

}
