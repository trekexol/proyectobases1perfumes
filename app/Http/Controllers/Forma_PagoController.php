<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forma_Pago;
use Validator, Response;
use App\Proveedor;
use DB;

class Forma_PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $proveedo)
    {
        $proveedor = Proveedor::findOrFail($proveedo);
        $fpagos = Forma_Pago::where('id_proveedor', '=', $proveedo)->paginate(5);
        return \view('Empresa.Modulos.Forma_Pago.index', \compact('fpagos', 'proveedor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($p)
    {
        $proveedor = Proveedor::findOrFail($p);
        return \view('Empresa.Modulos.Forma_Pago.create', \compact('proveedor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $fpago = new Forma_Pago();
        $fpago->id_proveedor = $id;
        $fpago->nombre = $request->get('nombre');
        $fpago->tipo = $request->get('tipo');
        $fpago->plazo_dias = $request->get('plazo_dias');
        $fpago->descripcion = $request->get('descripcion');
        $fpago->cuotas = $request->get('cuotas');
        $fpago->porcentaje_cuotas = $request->get('porcentaje_cuotas');
        $fpago->save();

        return \redirect('forma-pago/'.$id.'/create')->with('success', 'Guardado Correctamente');
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
        $administrador = DB::table('forma_pago')->where('id', $request->id)->first();
		

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
        $fpago = Forma_pago::findOrFail($id);
        return \view('Forma_Pago.update', \compact('fpago'));
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
        $fpago = Forma_Pago::findOrFail($id);
        $fpago->id_proveedor = $request->id_proveedor;
        $fpago->nombre = $request->nombre;
        $fpago->tipo = $request->tipo;
        $fpago->plazo_dias = $request->plazo_dias;
        $fpago->descripcion = $request->descripcion;
        $fpago->cuotas = $request->cuotas;
        $fpago->porcentaje_cuotas = $request->porcentaje_cuotas;

        $fpago->update();
        return \redirect('forma-pago')->with('success', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Forma_Pago::findOrFail($id)->delete();
        return \redirect('forma-pago')->with('success', 'Eliminado Correctamente');
    }
}
