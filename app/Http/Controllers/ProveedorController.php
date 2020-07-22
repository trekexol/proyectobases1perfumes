<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\miembro_ifra;
use App\contacto;
use App\asociacion_nacional;
use App\pais;
use PDF;
use DB;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return \view('Empresa.Proveedor.index_proveedor', \compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pais = pais::all();
        $asociaciones = asociacion_nacional::all();
        return \view('Empresa.Proveedor.create_proveedor', \compact('pais', 'asociaciones'));
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
         $pais = $request->get('pais');
         $proveedor = new Proveedor();
         $proveedor->nombre = $request->get('nombre');
         $proveedor->id_pais = $pais;
         $proveedor->correo_electronico = $request->get('email');
         $proveedor->pagina_web = $request->get('url');
         $proveedor->calle_avenida = $request->get('direccion');
         $proveedor->codigo_postal = $request->get('codigo_postal');
 
         if ($request->get('asociacion') == 0) {
             $proveedor->id_asociacion = null;
         } else {
             $proveedor->id_asociacion = $request->get('asociacion');
         }
 
        $proveedor->save();
 
         $contacto = new contacto();
         $contacto->codigo = $this->getAreaCode($request->get('telefono'));
         $contacto->numero_telefono = $this->getNumber($request->get('telefono'));
         $contacto->id_proveedor = $proveedor->id;
       $contacto->save();
 
         $miembro = new miembro_ifra();
         $miembro->tipo = $request->get('principal');
         $miembro->fecha_inicial = date('Y-m-d', \strtotime("now"));
         $miembro->id_proveedor = $proveedor->id;
         $miembro->save();
 
         return \redirect('proveedores/create')->with('success', 'proveedor creado correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor = DB::table('proveedor')
        ->join('contacto', 'contacto.id_proveedor', '=', 'proveedor.id')
        ->join('miembro_ifra', 'miembro_ifra.id_proveedor', '=', 'proveedor.id')
        ->where('proveedor.id', '=', $id)
        ->select('proveedor.id', 'proveedor.id_asociacion','proveedor.nombre', 'proveedor.calle_avenida as direccion', 'proveedor.pagina_web as url', 'proveedor.codigo_postal',
                'contacto.codigo', 'contacto.numero_telefono as telefono',
                'miembro_ifra.tipo as tipo_miembro')
        ->first();

        if ($proveedor->id_asociacion) {
            $asociacion = asociacion_nacional::where('id', '=', $proveedor->id_asociacion)->first();
        }
        else {
            $asociacion = null;
        }
        
       return \view('Empresa.Proveedor.show_proveedor', \compact('proveedor', 'asociacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $pais = pais::all();
        $pais_proveedor = pais::where('id', '=', $proveedor->id_pais)->first();
        $asociaciones = asociacion_nacional::all();
        $asociacion_proveedor = DB::table('asociacion_nacional')
        ->join('proveedor', 'asociacion_nacional.id', '=', 'proveedor.id_asociacion')
        ->where('proveedor.id', '=', $id)
        ->select('asociacion_nacional.*')
        ->first();
        $contacto = contacto::where('id_proveedor', '=', $id)->first();
        $miembro = miembro_ifra::where('id_proveedor', '=', $id)->first();
        return \view('Empresa.Proveedor.edit_proveedor', \compact('proveedor', 'pais', 'pais_proveedor', 'asociaciones', 'asociacion_proveedor', 'contacto', 'miembro'));
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
        $pais = $request->pais;
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->nombre = $request->nombre;
        $proveedor->id_pais = $pais;
        $proveedor->correo_electronico = $request->email;
        $proveedor->pagina_web = $request->url;
        $proveedor->calle_avenida = $request->direccion;
        $proveedor->codigo_postal = $request->codigo_postal;

        if ($request->asociacion == 0) {
            $proveedor->id_asociacion = null;
        } else {
            $proveedor->id_asociacion = $request->asociacion;
        }

       $proveedor->update();

        $contacto = contacto::where('id_proveedor', '=', $id)->first();
        $contacto->codigo = $this->getAreaCode($request->telefono);
        $contacto->numero_telefono = $this->getNumber($request->telefono);
        $contacto->update();

        $miembro = miembro_ifra::where('id_proveedor', '=', $id)->first();
        $miembro->tipo = $request->principal;
        $miembro->update();


        return \redirect(\action('ProveedorController@show', $proveedor->id))->with('success', 'Proveedor actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();
        return \redirect(\action('ProveedorController@index'))->with('success', 'Proveedor Eliminado Correctamente');
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

    public function reporte($proveedo)
    {
        $p = DB::select('select  p.nombre as proveedor, p.pagina_web, p.correo_electronico, p.calle_avenida, p.codigo_postal, pa.nombre as pais,
		c.codigo, c.numero_telefono, m.fecha_inicial, m.tipo, m.fecha_final
        from proveedor p 
        inner join pais pa on (p.id_pais = pa.id)
        inner join contacto c on (c.id_proveedor = p.id)
        inner join miembro_ifra m on (m.id_proveedor = p.id)
        where p.id = '.$proveedo.'');

        $proveedor = $p[0];

        $forma_pago = DB::select('select fa.nombre, fa.descripcion, fa.porcentaje_cuotas as porcentaje, fa.tipo, fa.cuotas, fa.plazo_dias
        from proveedor p 
        inner join forma_pago fa on (fa.id_proveedor = p.id)
        where p.id = '.$proveedo.'');

        $forma_envio = DB::select('select *
        from proveedor p 
        inner join forma_envio fa on (fa.id_proveedor = p.id)
        where p.id = '.$proveedo.'');

        $clientes = null;

        $productos = null;

        return \PDF::loadView('Empresa.Proveedor.reporte', \compact('proveedor', 'forma_pago', 'forma_envio') )->stream();
       // return \view('Empresa.Proveedor.reporte', \compact('proveedor'));
    }
}
