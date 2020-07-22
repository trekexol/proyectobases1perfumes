<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prohibido;
use DB;

class ProhibidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proh = Prohibido::all();
        return \view('Prohibido.index_proh', \compact('proh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proh = Prohibido::all();
        return \view('Prohibido.create', \compact('proh'));
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
         $proh = new Prohibido();
         $proh->tsca_cas = $request->get('tsca_cas');
         $proh->nombre = $request->get('nombre');
         $proh->tsca_cas = $request->get('tsca_cas');

         $proh->save();
 
         return \redirect('prohibido/index')->with('success', 'Se ha creado correctamente');
        
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
        $proh = Prohibido::findOrFail($id);

        $prohibido = DB::table('prohibido')
        ->where('prohibido.tsca_cas', '=', $id)
        ->select('prohibido.*')
        ->first();

        return \view('Prohibido.edit', \compact('proh', 'prohibido'));
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
        $proh = Prohibido::findOrFail($id);
        $proh->tsca_cas = $request->tsca_cas;
        $proh->nombre = $request->nombre;

       $proh->update();

        return \redirect('prohibido/index')->with('success', 'Se ha actualizado correctamente');

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
        $delete = Prohibido::findOrFail($id)->delete();
        return \redirect('prohibido/index')->with('success', 'Eliminado Correctamente');
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
