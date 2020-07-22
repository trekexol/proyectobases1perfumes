<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Response;
use App\pais;
use App\asociacion_nacional;
use App\productor;
use App\contacto;
use App\miembro_ifra;
use App\Productor_Pais;
use DB;

class ProductorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productores = productor::all();
        return \view('Empresa.Productor.index_productor', \compact('productores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pais = pais::all();
        $asociaciones = asociacion_nacional::all();
        return \view('Empresa.Productor.create_productor', \compact('pais', 'asociaciones'));
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
        $productor = new productor();
        $productor->nombre = $request->get('nombre');
        $productor->pagina_web = $request->get('url');
        $productor->calle_avenida = $request->get('direccion');
        $productor->codigo_postal = $request->get('codigo_postal');

        if ($request->get('asociacion') == 0) {
            $productor->id_asociacion = null;
        } else {
            $productor->id_asociacion = $request->get('asociacion');
        }

       $productor->save();

        $contacto = new contacto();
        $contacto->codigo = $this->getAreaCode($request->get('telefono'));
        $contacto->numero_telefono = $this->getNumber($request->get('telefono'));
        $contacto->id_productor = $productor->id;
      $contacto->save();

        $miembro = new miembro_ifra();
        $miembro->tipo = $request->get('principal');
        $miembro->fecha_inicial = date('Y/m/d', \strtotime("now"));
        $miembro->id_productor = $productor->id;
        $miembro->save();

        $pais = $request->get('pais');

        if ($pais) {
            for ($i=0; $i < count($pais); $i++) { 
                $pp = new Productor_Pais();
                $pp->id_productor = $productor->id;
                $pp->id_pais = $pais[$i];
                $pp->save();
           }

           return \redirect('productores/');
        } else {
            return \redirect('productores/create')->with('message', 'No se pudo guardar el pais, intente nuevamente');
        }
           
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productor = DB::table('productor')
        ->join('contacto', 'contacto.id_productor', '=', 'productor.id')
        ->join('miembro_ifra', 'miembro_ifra.id_productor', '=', 'productor.id')
        // ->join('asociacion_nacional', 'asociacion_nacional.id', '=', 'productor.id_asociacion')
        ->where('productor.id', '=', $id)
        ->select('productor.id', 'productor.id_asociacion','productor.nombre', 'productor.calle_avenida as direccion', 'productor.pagina_web as url', 'productor.codigo_postal',
                'contacto.codigo', 'contacto.numero_telefono as telefono',
                'miembro_ifra.tipo as tipo_miembro')
                // 'asociacion_nacional.nombre as nombre_as', 'asociacion_nacional.iniciales', 'asociacion_nacional.region')
        ->first();

        if ($productor->id_asociacion) {
            $asociacion = asociacion_nacional::where('id', '=', $productor->id_asociacion)->first();
        }
        else {
            $asociacion = null;
        }
       
       //TRAE LA ULTIMA MEMBRESIA, PARA VALIDAR SI ESTA ACTIVO O NO EL PRODUCTOR ------
        $membresia_productor = $this->validar_productor_membresia($id);

        if($membresia_productor->fecha_final){
            $activo = 'Membresia Inactiva';
        }else{
            $activo = 'Membresia Activa';
        }
       //----------------------------------------------------------------------
        return \view('Empresa.Productor.show_productor', \compact('productor', 'asociacion','activo'));
    }


    public function validar_productor_membresia($id)
    {
        $productor_activo = DB::table('miembro_ifra')->latest('fecha_final')
      
        ->where('miembro_ifra.id_productor', '=', $id)
        ->select('miembro_ifra.id_productor as id_productor'
        , 'miembro_ifra.id as id'
        , 'miembro_ifra.tipo as tipo_membresia'
        , 'miembro_ifra.fecha_inicial as fecha_inicial'
        , 'miembro_ifra.fecha_final as fecha_final')
        ->first();

     
        return $productor_activo;

       
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
        $productor = productor::findOrFail($id);
        $productor->delete();
        return \redirect(\action('ProductorControlle@index'));
    }

    public function stringToNumber($string)
    {
        $number = intval(preg_replace('/[^0-9]+/', '', $string), 10); 
        return $number;
    }

    public function getAreaCode($number)
    {
        $digitos = strlen($number) - 2;
        $area = intdiv ( $this->stringToNumber($number) ,  $digitos);
        return $area;
    }

    public function getNumber($number)
    {
        $phone = substr($this->stringToNumber($number), -10);
        return $phone;
        
    }
}
