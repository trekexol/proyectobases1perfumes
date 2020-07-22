<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forma_Envio;
use Validator, Response;
use DB;
use App\Proveedor;
use App\Pais;

class Forma_EnvioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $p)
    {
        $proveedor = Proveedor::findOrFail($p);
        $envios = Forma_Envio::where('id_proveedor', '=', $p)->paginate(5);
        return \view('Empresa.Modulos.Forma_Envio.index', \compact('envios', 'proveedor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $pais_proveedor = DB::select('SELECT p.nombre, p.id from "pais" p, "proveedor" pr where p.id = pr.id_pais and pr.id_pais = '.$proveedor->id_pais.'');
        return \view('Empresa.Modulos.Forma_Envio.create', \compact('proveedor', 'pais_proveedor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $envio = new Forma_Envio();
        $envio->id_proveedor = $id;
        $envio->id_pais = $request->get('pais');
        $envio->coste = $request->get('coste');
        $envio->transporte = $request->get('transporte');
        $envio->extras = $request->get('extras');
        
        $envio->save();
        
        $check = request()->validate([
            'id_pais' => 'required',
            'id_proveedor' => 'required',
            'coste' => 'required',
            'transporte' => 'required'
        ]);
        // return response()->json($envio);
        return \redirect(\action('Forma_EnvioController@create', $id));
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
        $administrador = DB::table('forma_envio')->where('id', $request->id)->first();
		

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
    public function edit($id, $proveedor)
    {
        $envio = Forma_Envio::findOrFail($id);
        return \view('Forma_Envio.update', \compact('envio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $proveedor)
    {
        $envio = Forma_Envio::findOrFail($id);
        $envio->id_proveedor = $request->id_proveedor;
        $envio->id_pais = $request->id_pais;
        $envio->coste = $request->coste;
        $envio->transporte = $request->transporte;
        $envio->extra = $request->extra;

        $envio->update();
        return \redirect('forma-envio')->with('success', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $proveedor)
    {
        $delete = Forma_Envio::findOrFail($id)->delete();
        return \redirect('forma-envio')->with('success', 'Eliminado Correctamente');
    }
}
