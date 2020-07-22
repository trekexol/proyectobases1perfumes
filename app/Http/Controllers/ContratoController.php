<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contrato;
use Validator, Response;
use App\productor;
use App\Proveedor;
use App\Condicion_Contrato;
use DB;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $productor = productor::findOrFail($id);
        // $contratos = Contrato::
        // where('')
        // ->where('id_productor', '=', $id)->paginate(5);
        $contratos = DB::table('contrato')
        ->join('proveedor', 'proveedor.id', '=', 'contrato.id_proveedor')
        ->where('contrato.id_productor', '=', $id)
        ->select('contrato.*', 'proveedor.nombre as proveedor_nombre')
        ->orderBy('id_contrato')
        ->paginate(5);
        return \view('Contrato.index', \compact('contratos', 'productor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($productor, $proveedor)
    {
        $productor = productor::findOrFail($productor);
        $proveedor = Proveedor::findOrFail($proveedor);
        return \view('Contrato.create', \compact('proveedor', 'productor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($productor, $proveedor)
    {
        $contrato = new Contrato();
        $contrato->id_productor = $productor;
        $contrato->id_proveedor = $proveedor;
        $contrato->fecha_inicial = date('Y-m-d', \strtotime("now"));
        $contrato->save();
        $id = $contrato->id_contrato;

       return \redirect('productores/'.$productor.'/contrato/'.$proveedor.'/condicion/'.$id.'/create');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($productor, $contrato, $proveedor)
    {
        $productor = productor::findOrFail($productor);
        $contrato = Contrato::findOrFail($contrato);
        $proveedor = Proveedor::findOrFail($proveedor);
        $metodo_pago = DB::table('forma_pago')
        ->join('condicion_contrato', 'condicion_contrato.id_forma_pago', '=', 'forma_pago.id')
        ->where('forma_pago.id_proveedor', '=', $proveedor->id)
        ->select('forma_pago.*')
        ->first();
        $metodo_envio = DB::table('forma_envio')
        ->join('condicion_contrato', 'condicion_contrato.id_forma_envio', '=', 'forma_envio.id')
        ->join('pais', 'pais.id', '=', 'forma_envio.id_pais')
        ->where('forma_envio.id_proveedor', '=', $proveedor->id)
        ->select('forma_envio.*', 'pais.nombre as nombre_pais')
        ->first();
        return \view('Contrato.show', \compact('productor', 'contrato', 'proveedor', 'metodo_pago', 'metodo_envio'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $contrato = Contrato::findOrFail($id);
        return \view('Contrato.update', \compact('contrato'));
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
        $contrato = Contrato::findOrFail($id);
        $contrato->id_productor = $request->id_productor;
        $contrato->id_proveedor = $request->id_proveedor;
        $contrato->fecha_emision = $request->fecha_emision;
        $contrato->exclusividad = $request->exclusividad;
        $contrato->fecha_cancelacion = $request->fecha_cancelacion;
        $contrato->motivo_cancelacion = $request->motivo_cancelacion;

        $contrato->update();
        return \redirect('contrato')->with('success', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($contrato)
    {
        $delete = Contrato::findOrFail($contrato);
        $id = $delete->id_productor;
        $delete->delete();
        return \redirect()->action('ContratoController@index', $id)->with('success', 'Contrato No:'.$id.' no finalizado');
    }
}
