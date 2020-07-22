<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Renovacion;
use Validator, Response;
use DB;

class RenovacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $renovaciones = Renovacion::paginate(5);
        return \view('Renovacion.index', \compact('renovaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('Renovacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $renovacion = new Renovacion();
        $renovacion->id_contrato = $request->get('id_contrato');
        $renovacion->fecha = $request->get('fecha');
    
        $check = request()->validate([
            'id_contrato' => 'required',
            'fecha' => 'required',
        ]);
        
        $renovacion->save();
        // return response()->json($renovacion);
        return \redirect('renovacion')->with('success', 'Guardado Correctamente');
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
        $administrador = DB::table('renovacion')->where('id', $request->id)->first();
		

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
    public function edit($id)
    {
        $renovacion = Renovacion::findOrFail($id);
        return \view('Renovacion.update', \compact('renovacion'));
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
        $renovacion = Renovacion::findOrFail($id);
        $renovacion->id_contrato = $request->id_contrato;
        $renovacion->fecha = $request->fecha;

        $renovacion->update();
        return \redirect('renovacion')->with('success', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Renovacion::findOrFail($id)->delete();
        return \redirect('renovacion')->with('success', 'Eliminado Correctamente');
    }
}