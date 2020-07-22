<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfumista;
use App\Pais;
use Validator, Response;
use DB;

class PerfumistaController extends Controller
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
            return \view('Perfumista.index', \compact('vars'));
        } 
        else if ($name != '') {
            $vars = DB::table('perfumista')
            ->join('pais', 'pais.id', '=', 'perfumista.id_pais')
            ->orWhere('perfumista.nombre_primero', 'LIKE', '%'.$name.'%')
            ->select('perfumista.*', 'pais.nombre as nombre_pais')
            ->paginate(5);
            
           
               

            }

            return \view('Perfumista.index', \compact('vars'));
        }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pais = Pais::all();
       
        return \view('Perfumista.create', \compact('pais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vars = new Perfumista();
        $vars->nombre_primero = $request->get('nombre_primero');
        $vars->nombre_segundo = $request->get('nombre_segundo');
        $vars->apellido_primero = $request->get('apellido_primero');
        $vars->apellido_segundo = $request->get('apellido_segundo');
        $vars->genero = $request->get('genero');
        $vars->id_pais = $request->get('pais');
        
        $check = request()->validate([
            'nombre_primero' => 'required',
            
            'apellido_primero' => 'required'
           
        ]);
        
        $vars->save();

        

        
           
        return \redirect('perfumista')->with('success', 'Guardado Correctamente');
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
        $var = Perfumista::findOrFail($id);
        return \view('Perfumista.update', \compact('var'));
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
        $var = Perfumista::findOrFail($id);
        $var->nombre_primero = $request->nombre_primero;
        $var->nombre_segundo = $request->nombre_segundo;
        $var->apellido_primero = $request->apellido_primero;
        $var->apellido_segundo = $request->apellido_segundo;
        $var->genero = $request->genero;
        $var->id_pais = $request->id_pais;
        $var->update();
        return \redirect('perfumista')->with('success', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Perfumista::findOrFail($id)->delete();
        return \redirect('perfumista')->with('success', 'Eliminado Correctamente');
    }
}
