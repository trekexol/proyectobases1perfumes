<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluacion;
use App\Proveedor;
use App\productor;
use App\pais;
use DB;

use Illuminate\Database\Eloquent\Collection;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($p)
    {
        $productor = productor::findOrFail($p);
        //Regresa los proveedores que tienen una evaluacion al productor
        $evaluaciones = DB::table('evaluacion')
        ->join('proveedor', 'evaluacion.id_proveedor', '=', 'proveedor.id')
        ->join('productor', 'evaluacion.id_productor', '=', 'productor.id')
        ->where('evaluacion.id_productor', '=', $p)
        ->select('proveedor.nombre', 'evaluacion.*')
        ->paginate(5);

        $membresia_productor = $this->validar_productor_membresia($p);


        return \view('Empresa.Modulos.Evaluacion.index_evaluacion', \compact('evaluaciones', 'productor','membresia_productor'));
    }

    public function validar_productor_membresia($id)
    {
        $productor_activo = DB::table('miembro_ifra')->latest('fecha_final')
       // ->where('miembro_ifra.fecha_final', '=', null)
        ->where('miembro_ifra.id_productor', '=', $id)
        ->select('miembro_ifra.id_productor as id_productor'
        , 'miembro_ifra.tipo as tipo_membresia'
        , 'miembro_ifra.fecha_inicial as fecha_inicial'
        , 'miembro_ifra.fecha_final as fecha_final')
        ->first();

     
        return $productor_activo;

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

    public function evaluacionInicial($idproductor)
    {
        $productor = productor::findOrFail($idproductor);
       //VALIDA QUE PROVEEDORES HACEN ENVIOS A LOS PAISES DE MI PRODUCTOR
        $proveedores_envios = $this->validar_pais($idproductor);
       
        $proveedores_miembros = $this->validar_Miembros($proveedores_envios);

        //VERIFICAR CUALES PROVEEDORES NO TIENEN CONTRATOS CON EL PRODUCTOR
      //  $proveedores = $this->verificar_contratos($proveedores_miembros);
      $proveedores =$proveedores_miembros;

        $paises = $this->buscar_pais_nombre($proveedores);


        return \view('Empresa.Modulos.Evaluacion.Inicial.resultado_inicial', \compact('productor', 'proveedores','paises'));
    }

    public function validar_pais($idproductor)
    {
       
        $proveedores_pontenciales = DB::table('forma_envio')
        ->join('productor_pais', 'productor_pais.id_pais', '=', 'forma_envio.id_pais')
        ->join('proveedor', 'proveedor.id', '=', 'forma_envio.id_proveedor')
        ->join('pais', 'pais.id', '=', 'forma_envio.id_pais')
        ->join('productor', 'productor.id', '=', 'productor_pais.id_productor')
        ->where('productor.id', '=', $idproductor)
        
        ->select('proveedor.id as id_proveedor'
        , 'proveedor.nombre as nombre_proveedor'
        , 'proveedor.id_pais as id_pais'
        , 'proveedor.pagina_web as pagina_web'
        , 'proveedor.codigo_postal as codigo_postal'
        , 'proveedor.calle_avenida as calle_avenida')
         ->groupBy('proveedor.nombre', 'proveedor.id')
        ->paginate();


        return $proveedores_pontenciales;



    }

    public function verificar_contratos($proveedores)
    {
       //VERIFICA SI EL PRODUCTOR YA HIZO CONTRATOS CON EL PROVEEDOR

            $proveedores_pontenciales = DB::table('contrato')
                ->join('proveedor', 'proveedor.id', '=', 'contrato.id')
                ->where('proveedor', '=', $proveedores)
                ->where('contrato.id_proveedor', '=', $id_proveedor)
                ->select('contrato.id as id_contrato'
            , 'contrato.id as id_contrato')
                
                ->first();
            

     


        return $proveedores_pontenciales;
     }

    public function buscar_pais_nombre($proveedores)
    {
        for ($i=0; $i < count($proveedores); $i++) { 
             $pais[$i] =  pais::findOrFail($proveedores[$i]->id_pais);
        }

        return $pais;
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
