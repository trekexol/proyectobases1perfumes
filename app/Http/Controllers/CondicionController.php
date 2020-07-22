<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Condicion_Contrato;
use App\Contrato;
use App\productor;
use App\Proveedor;

use App\Forma_Envio;
use Validator, Response;
use DB;

class CondicionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $condiciones = Condicion_Contrato::paginate(5);
        // return \view('Condicion_Contrato.index', \compact('condiciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($produc, $provee, $c)
    {
        $contrato = Contrato::findOrFail($c);
        $productor = productor::findOrFail($produc);
        $proveedor = Proveedor::findOrFail($provee);

        //CARGA LAS FORMAS DE PAGO DEL PROVEEDOR
        $metodo_pago = DB::table('forma_pago')
        ->where('id_proveedor', '=', $provee)
        ->get();

        //CARGA LAS FORMAS DE ENVIO DEL PROVEEDOR TODAS
      /*  $metodo_envio = DB::table('forma_envio')
        ->where('id_proveedor', '=', $provee)
        ->get();
        */

        $metodo_envio = $this->validar_pais($produc,$provee);


        return \view('Condicion_Contrato.create', \compact('contrato', 'productor', 'proveedor', 'metodo_pago', 'metodo_envio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $productor, $proveedor, $contrato)
    {
        //CONDICIONES DE LOS PAGOS -----------------------------------------------------
      /*  $condicion_pago = new Condicion_Contrato();
        $condicion_pago->id_contrato = $contrato;
        $condicion_pago->id_contrato_productor = $productor;
        $condicion_pago->id_contrato_proveedor = $proveedor;
        $condicion_pago->id_proveedor_pago = $proveedor;
        $condicion_pago->id_forma_pago = $request->get('metodo_pago');
        $condicion_pago->save();*/

        

       

       //CONDICIONES DE LOS ENVIOS --------------------------------------------------------

       


       $metodo_envio = $request->get('metodo_envio');
     

            if ($metodo_envio) {
                for ($i=0; $i < count($metodo_envio); $i++) { 

                    $condicion_envio = new Condicion_Contrato();
                    $condicion_envio->id_contrato = $contrato;
                    $condicion_envio->id_contrato_productor = $productor;
                    $condicion_envio->id_contrato_proveedor = $proveedor;

                    $forma_envio = $this->buscar_forma_envio($metodo_envio[$i]);
                   
                    $condicion_envio->id_pais_envio = $forma_envio->id_pais;
                    $condicion_envio->id_proveedor_envio = $forma_envio->id_proveedor;
                    $condicion_envio->id_forma_envio = $metodo_envio[$i];
                  
                    $condicion_envio->save();
            }

           
            } else {
                return \redirect('/productores/'.$productor.'/contrato/'.$proveedor.'/condicion/'.$contrato.'/create')->with('message', 'No se pudo guardar el metodo de envio, intente nuevamente');
            }

        /*$condicion_envio->id_pais_envio = Proveedor::findOrFail($proveedor)->id_pais;
        $condicion_envio->id_proveedor_envio = $proveedor;
        $condicion_envio->save();*/

       

       

       /* if ($request->get('descuento') != '') {
            $c = Contrato::findOrFail($contrato);
            $descuento = (int)$request->get('descuento');
            $c->descuento = $descuento;
            $c->update();
        }*/


      /* $check = request()->validate(
        [
        'metodo_pago' => 'required',
        'metodo_envio' => 'required',
        ],
        [
            'metodo_pago.required' => 'Selecciona un metodo de pago',
            'metodo_envio.required' => 'Selecciona un metodo de envio'
        ]
    );*/
       // return 'hola';
        return \redirect('productores/'.$productor.'/contrato/'.$proveedor.'/ingrediente/'.$contrato.'/create')->with('success', 'Guardado Correctamente');
    }

    public function buscar_forma_envio($id)
    {
        $forma_envio = Forma_Envio::findOrFail($id);
        return $forma_envio;
    }




    public function validar_pais($idproductor,$idproveedor)
    {
       $lugar_envio = DB::table('forma_envio')
        ->join('productor_pais', 'productor_pais.id_pais', '=', 'forma_envio.id_pais')
        ->join('proveedor', 'proveedor.id', '=', 'forma_envio.id_proveedor')
        ->join('pais', 'pais.id', '=', 'forma_envio.id_pais')
        ->join('productor', 'productor.id', '=', 'productor_pais.id_productor')
        ->where('productor.id', '=', $idproductor)
        ->where('proveedor.id', '=', $idproveedor)
        
        ->select('forma_envio.transporte as transporte',
        'forma_envio.id as id',
        'forma_envio.coste as coste',
        'forma_envio.extras as extras',
        'pais.nombre as nombre_pais', 'pais.id as id_pais',
        'proveedor.nombre as nombre_proveedor', 'proveedor.id as id_proveedor')
        ->get();


        return $lugar_envio;
    }


  /*  public function store(Request $request, $productor, $proveedor, $contrato)
    {
        $condicion_pago = new Condicion_Contrato();
        $condicion_pago->id_contrato = $contrato;
        $condicion_pago->id_contrato_productor = $productor;
        $condicion_pago->id_contrato_proveedor = $proveedor;
        $condicion_pago->id_forma_pago = $request->get('metodo_pago');
        $condicion_pago->id_proveedor_pago = $proveedor;
        $condicion_pago->save();

        $condicion_envio = new Condicion_Contrato();
        $condicion_envio->id_contrato = $contrato;
        $condicion_envio->id_contrato_productor = $productor;
        $condicion_envio->id_contrato_proveedor = $proveedor;
        $condicion_envio->id_forma_envio = $request->get('metodo_envio');
        $condicion_envio->id_pais_envio = Proveedor::findOrFail($proveedor)->id_pais;
        $condicion_envio->id_proveedor_envio = $proveedor;
        $condicion_envio->save();

        

        if ($request->get('descuento') != '') {
            $c = Contrato::findOrFail($contrato);
            $descuento = (int)$request->get('descuento');
            $c->descuento = $descuento;
            $c->update();
        }


       $check = request()->validate(
        [
        'metodo_pago' => 'required',
        'metodo_envio' => 'required',
        ],
        [
            'metodo_pago.required' => 'Selecciona un metodo de pago',
            'metodo_envio.required' => 'Selecciona un metodo de envio'
        ]
    );
       // return 'hola';
        return \redirect('productores/'.$productor.'/contrato/'.$proveedor.'/ingrediente/'.$contrato.'/create')->with('success', 'Guardado Correctamente');
    }*/

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
        $condicion = Condicion_Contrato::findOrFail($id);
        return \view('Condicion_Contrato.update', \compact('condicion'));
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
        $condicion = Condicion_Contrato::findOrFail($id);
        $condicion->id_contrato = $request->id_contrato;
        $condicion->id_productor = $request->id_productor;
        $condicion->id_proveedor = $request->id_proveedor;
        $condicion->id_forma_pago = $request->id_forma_pago;
        $condicion->id_forma_envio = $request->id_forma_envio;

        $condicion->update();
        return \redirect('condicion-contrato')->with('success', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Condicion_Contrato::findOrFail($id)->delete();
        return \redirect('condicion-contrato')->with('success', 'Eliminado Correctamente');
    }
}
