<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productor;
use App\Pedido;
use App\Proveedor;
use App\Detalle_Pedido;
use App\Pago;

use DB;

class DetallePedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $productor = productor::findOrFail($id);
        //Busca los proveedores activos (los que tengan contratos vigentes)
        $proveedores = DB::table('proveedor')
        ->join('contrato', 'contrato.id_proveedor', '=', 'proveedor.id')
        ->join('productor', 'contrato.id_productor', '=', 'productor.id')
        ->where('productor.id', '=', $id)
        ->whereNull('contrato.motivo_cancelacion')
        ->select('proveedor.nombre', 'contrato.id_contrato', 'contrato.id_productor', 'contrato.id_proveedor')
        ->paginate(5);
        // $proveedores = (object) $proveedor; 
        $prueba = 'hola';
        return \view('Empresa.Modulos.Pedidos.Pedido.clientes', \compact('productor', 'proveedores', 'prueba'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_productor, $id_pedido)
    {

        $productor = productor::findOrFail($id_productor);

        $pedido = Pedido::findOrFail($id_pedido);

        $proveedor = proveedor::findOrFail($pedido->id_proveedor);

        // $proveedor = DB::table('proveedor')
        // ->where('proveedor.id', '='. $id_proveedor)
        // ->get();

        return \view('Empresa.Modulos.Pedidos.Pedido.create_detalle_pedido', \compact('productor', 'proveedor', 'pedido'));
        // return 'hola';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $productor, $pedido)
    {
        $monto_total = 0;
        for ($i=0; $i < \count($request->get('producto')); $i++) { 
            $detalle = new Detalle_Pedido();
            $detalle->id_pedido = $pedido;
            $detalle->id_presentacion = $request->get('producto')[$i]['id'];
            $detalle->cantidad = $request->get('producto')[$i]['cant'];

            // $precio = DB::table('presentacion_ingrediente')
            // ->where('presentacion_ingrediente.pc', '=', $detalle->id_presentacion)
            // ->select('presentacion_ingrediente.precio')
            // ->first();

            $monto_total += $precio->precio * $detalle->cantidad;
            //$detalle->save();
        }

        $p = Pedido::findOrFail($pedido);
        //busca la forma de pago del contrato arreglar
        $metodo_pago = DB::table('forma_pago')
        ->join('condicion_contrato', 'condicion_contrato.id_forma_pago', '=', 'forma_pago.id')
        ->join('pedido', 'pedido.id_condicion_pago', '=', 'condicion_contrato.id')
        ->where('pedido.id_condicion_pago', '=', $p->id_condicion_pago)
        ->select('forma_pago.*')
        ->first();
        


      ///Esto no funciona revisar
        if ($metodo_pago->cuotas == 0) {
            //si las cuotas son 0 se hace un solo pago
            $pagos = new Pago();
            $pagos->fecha = date('Y/m/d', \strtotime('now'));
            $pagos->monto = 500;
            $pagos->id_pedido = $p->id;
            // $pagos->save();
        } else {
            // si tiene cuotas 
           
            for ($i= $metodo_pago->cuotas; $i > 0; $i--) { 
                $monto_total += ($monto_total * ($metodo_pago->porcentaje_cuotas / 100));

                    $dias_de_pago = $metodo_pago->plazo_dias/ $i;
                    $dia = '+'.$dias_de_pago.' days';

                    $pagos = new Pago();
                    $pagos->fecha = date('Y/m/d', \strtotime('now'.$dia));
                    $pagos->monto = 600;
                    $pagos->id_pedido = $p->id;
              //       $pagos-save();
                
            }
        }
        
        
        //actualiza el pedido con el monto
        $p = Pedido::findOrFail($pedido);
        $p->monto_total = $monto_total;
        //$p->update;

         //return response()->json($example);

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
