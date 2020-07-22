<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluacion;
use App\Proveedor;
use App\productor;
use App\miembro_ifra;
use DB;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Collection;

class Miembro_IfraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($p)
    {
        $productor = productor::findOrFail($p);
       
        $membresia_productor = $this->validar_productor_membresia($p);

        $historial = $this->historial_membresia($p);


        return \view('Empresa.Modulos.Membresia.index_evaluacion', \compact('productor','membresia_productor','historial'));
    }



    public function menu_membresia($p)
    {
        $productor = productor::findOrFail($p);
       
        $membresia_productor = $this->validar_productor_membresia($p);

    
       $fecha_actual = Carbon::now('America/Caracas')->format('Y-m-d');


        return \view('Empresa.Modulos.Membresia.menu_membresia', \compact('productor','membresia_productor','fecha_actual'));
    }

    public function activar_membresia(Request $request,$id)
    {
       
        $membresia = new miembro_ifra();
        $membresia->fecha_inicial = $request->get('fecha_inicial');
        $membresia->tipo = $request->get('tipo');
        $membresia->id_productor = $id;
       

        $fecha_final = new Carbon($request->fecha_final);

        $fecha_inicial = new Carbon($request->fecha_inicial);
 
        $diferencia_dias = $fecha_inicial->diffInDays($fecha_final, false);
 
        
 
         if($diferencia_dias < 0){
            $membresia->save();

            return \redirect('membresia/'.$id.'')->with('success', 'Membresia Activa Correctamente');

         }else{
            return \redirect('membresia/'.$id.'')->with('message', 'La fecha debe ser posterior a la ultima cancelacion');
         }
        
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

    public function historial_membresia($id)
    {
        $historial = DB::table('miembro_ifra')
      
        ->where('miembro_ifra.id_productor', '=', $id)
        ->select('miembro_ifra.id_productor as id_productor'
        , 'miembro_ifra.tipo as tipo'
        , 'miembro_ifra.fecha_inicial as fecha_inicial'
        , 'miembro_ifra.fecha_final as fecha_final')
        ->get();

     
        return $historial;

       
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productor = productor::findOrFail($id);
       
        $membresia_productor = $this->validar_productor_membresia($id);

        $historial = $this->historial_membresia($id);

        return \view('Empresa.Modulos.Membresia.index_membresia', \compact('productor','membresia_productor','historial'));
  
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
        $var = miembro_ifra::findOrFail($id);
        $var->fecha_final = $request->fecha_final;

        
      // $fecha_actual = Carbon::now('America/Caracas')->format('Y-m-d');

       $fecha_final = new Carbon($request->fecha_final);

       $fecha_inicial = new Carbon($request->fecha_inicial);

       $diferencia_dias = $fecha_inicial->diffInDays($fecha_final, false);

       

        if($diferencia_dias > 0){
            $var->update();
            return \redirect('membresia/'.$request->id_productor.'')->with('success', 'Ha sido Cancelada su Membresia Correctamente ');
           
        }else{
            return \redirect('membresia/'.$request->id_productor.'')->with('message', 'No puede ingresar una fecha anterior a la de inicio de Membresia');
   
        }
       
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

    public function evaluacionInicial($idproductor)
    {
        $productor = productor::findOrFail($idproductor);
       //VALIDA QUE PROVEEDORES HACEN ENVIOS A LOS PAISES DE MI PRODUCTOR
        $proveedores_envios = $this->validar_pais($idproductor);
        //$proveedores = $this->validar_pais($idproductor);

        $proveedores = $this->validar_Miembros($proveedores_envios);


        return \view('Empresa.Modulos.Evaluacion.Inicial.resultado_inicial', \compact('productor', 'proveedores'));
    }

    public function validar_pais($idproductor)
    {
       $lugar_envio = DB::table('forma_envio')
        ->join('productor_pais', 'productor_pais.id_pais', '=', 'forma_envio.id_pais')
        ->join('proveedor', 'proveedor.id', '=', 'forma_envio.id_proveedor')
        ->join('pais', 'pais.id', '=', 'forma_envio.id_pais')
        ->join('productor', 'productor.id', '=', 'productor_pais.id_productor')
        ->where('productor.id', '=', $idproductor)
        
        ->select('forma_envio.id_proveedor as id_proveedor', 'forma_envio.transporte as transporte',
        'pais.nombre as nombre_pais', 'pais.id as id_pais',
        'proveedor.nombre as nombre_proveedor', 'proveedor.id as id_proveedor')
        ->get();


        return $lugar_envio;
    }

    public function validar_Miembros($proveedores)
    {
        $proveedores_activos = DB::table('miembro_ifra')
        ->join('proveedor', 'proveedor.id', '=', 'miembro_ifra.id_proveedor')
        ->where('miembro_ifra.fecha_final', '=', null)
        ->select('miembro_ifra.id_proveedor','proveedor.id as id_proveedor', 'proveedor.nombre as nombre_proveedor')
        ->get();

        $confirmados = null;
        $i = 0;
            foreach ($proveedores as $var) {
                foreach ($proveedores_activos as $var2) {
                    if($var->id_proveedor == $var2->id_proveedor ){
                        $confirmados[$i] = $var;
                       
                        $i = $i + 1;
                    }
                }
            }

        return $confirmados;
       // return $proveedores_activos;
    }

   /* public function validar_Miembros($proveedores)
    {
        $proveedores_activos = DB::table('miembro_ifra')
        ->join('proveedor', 'proveedor.id', '=', 'miembro_ifra.id_proveedor')
        ->where('miembro_ifra.fecha_final', '=', null)
        ->select('miembro_ifra.id_proveedor','proveedor.id as id_proveedor')
        ->get();

        $confirmados = null;
        $i = 0;
            foreach ($proveedores as $var) {
                foreach ($proveedores_activos as $var2) {
                    if($var->id_proveedor == $var2->id_proveedor ){
                        $confirmados[$i] = $var->id_proveedor;
                        $i = $i + 1;
                    }
                }
            }

        return $confirmados;
    }*/

  

    public function evaluacionAnual( $idproductor)
    {
        
    }
}
