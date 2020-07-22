<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Otros_Ingredientes;
use App\Proveedor;
use DB;

class O_IngredientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingr = Otros_Ingredientes::all();
        return \view('Ingredientes.Otros_Ingredientes.index', \compact('ingr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prov = Proveedor::all();
        $ingr = Otros_Ingredientes::all();
        return \view('Ingredientes.Otros_Ingredientes.create', \compact('ingr', 'prov'));
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
         $prov = $request->get('prov');
         $ingred = new Otros_Ingredientes();
         $ingred->id_proveedor = $prov;
         $ingred->nombre = $request->get('nombre');
         $ingred->formula_quimica = $request->get('formula_quimica');
         $ingred->ipc = $request->get('ipc');
         $ingred->tsca_cas = $request->get('tsca_cas');

         $ingred->save();
 
         return \redirect('otros-ingredientes/index')->with('success', 'Ingrediente creado correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    //   $ingr = Otros_Ingredientes::findOrFail($id);
       
    //   return \view('Ingredientes.Otros_Ingredientes.index', \compact('ingr'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingr = Otros_Ingredientes::findOrFail($id);
        $prove = Proveedor::all();
        //$ingr_prov = Otros_Ingredientes::where('id_proveedor', '=', $prov->id)->first();

        $ingrediente_proveedor = DB::table('otros_ingredientes')
        ->join('proveedor', 'otros_ingredientes.id_proveedor', '=', 'proveedor.id')
        ->where('otros_ingredientes.id', '=', $id)
        ->select('otros_ingredientes.*')
        ->first();

        return \view('Ingredientes.Otros_Ingredientes.edit', \compact('ingr', 'prove', 'ingrediente_proveedor'));
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
        $prov = $request->prov;
        $ingr = Otros_Ingredientes::findOrFail($id);
        $ingr->nombre = $request->nombre;
        $ingr->id_proveedor = $prov;
        $ingr->formula_quimica = $request->formula_quimica;
        $ingr->ipc = $request->ipc;
        $ingr->tsca_cas = $request->tsca_cas;

       $ingr->update();

        return \redirect('otros-ingredientes/index')->with('success', 'Ingrediente actualizado correctamente');

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
        $delete = Otros_Ingredientes::findOrFail($id)->delete();
        return \redirect('otros-ingredientes/index')->with('success', 'Eliminado Correctamente');
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
