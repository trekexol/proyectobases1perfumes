<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\productor;
use DB;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $productor = productor::findOrFail($id);
        $pedidos = DB::table('pedido')
        ->where('pedido.id_productor', '=', $id)
        ->paginate(5);
        return \view('Empresa.Modulos.Pedidos.Pedido.index', \compact('productor', 'pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id_productor, $id_contrato, $id_proveedor)
    {

        $id_condicion_pago = DB::table('condicion_contrato')
        ->where('condicion_contrato.id_contrato', '=', $id_contrato)
        ->whereNotNull('condicion_contrato.id_forma_pago')
        ->select('condicion_contrato.id')
        ->first();

        $id_condicion_envio = DB::table('condicion_contrato')
        ->where('condicion_contrato.id_contrato', '=', $id_contrato)
        ->whereNotNull('condicion_contrato.id_forma_envio')
        ->select('condicion_contrato.id')
        ->first();

        $pedido = new Pedido();
        $pedido->fecha = date('Y/m/d', \strtotime('now'));
        $pedido->estatus = 'Pendiente';
        $pedido->id_proveedor = $id_proveedor;
        $pedido->id_contrato = $id_contrato;
        $pedido->id_productor = $id_productor;
        $pedido->id_contrato_productor = $id_productor;
        $pedido->id_contrato_proveedor = $id_proveedor;
        $pedido->id_condicion_envio = $id_condicion_envio->id;
        $pedido->id_condicion_pago = $id_condicion_pago->id;
        $pedido->save();

        $id_pedido = $pedido->id;
        return \redirect(action('DetallePedidoController@create', ['productor'=> $id_productor, 'pedido'=> $id_pedido]));
      
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
