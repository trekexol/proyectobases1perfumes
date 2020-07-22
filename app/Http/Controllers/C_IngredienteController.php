<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contrato_Ingrediente;
use Validator, Response;
use DB;
use App\Contrato;
use App\productor;
use App\Proveedor;

class C_IngredienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
        $materias = DB::table('presentacion_ingrediente')
        ->join('materia_esencia', 'materia_esencia.id', '=', 'presentacion_ingrediente.id_materia')
        ->where('materia_esencia.id_proveedor', '=', $proveedor->id)
        ->select('materia_esencia.id', 'materia_esencia.nombre', 'presentacion_ingrediente.pc', 'presentacion_ingrediente.volumen_ml')
        ->paginate();

        $otros_ingredientes = DB::table('presentacion_ingrediente')
        ->join('otros_ingredientes', 'otros_ingredientes.id', '=', 'presentacion_ingrediente.id_otros_ingredientes')
        ->where('otros_ingredientes.id_proveedor', '=', $proveedor->id)
        ->select('otros_ingredientes.id', 'otros_ingredientes.nombre', 'presentacion_ingrediente.pc', 'presentacion_ingrediente.volumen_ml', )
        ->paginate();

        return \view('Contrato_Ingrediente.create', \compact('contrato', 'productor', 'proveedor', 'materias', 'otros_ingredientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $productor, $proveedor, $contrato)
    {

        $check = request()->validate(
            [
            'producto' => 'required|min:1',
            'aceptar' => 'required',
            ],
            [
                'producto.required' => 'Selecciona un ingrediente',
                'aceptar.required' => 'Este campo es requerido para continuar'
            ]);
            
        for ($i=0; $i < count($request->get('producto')); $i++) { 
            $c_ing = new Contrato_Ingrediente();
            $c_ing->id_contrato = $contrato;
            $c_ing->id_productor = $productor;
            $c_ing->id_proveedor = $proveedor;
            $c_ing->id_presentacion_ingrediente = $request->get('producto')[$i];
            $c_ing->save();

        }

        if ($request->get('exclusivo')) {
            $c = Contrato::findOrFail($contrato);
            $c->exclusividad = true;
            $c->update();
        }
       

        return \redirect('contrato/show/'.$productor.'/'.$contrato.'/'.$proveedor.'')->with('success', 'Guardado Correctamente');
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
        $contrato = Contrato::findOrFail($id);
        return \view('Contrato_Ingrediente.update', \compact('contrato'));
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
        $c_ing = Contrato_Ingrediente::findOrFail($id);
        $c_ing->id_contrato = $request->id_contrato;
        $c_ing->id_presentacion_ingrediente = $request->id_presentacion_ingrediente;

        $c_ing->update();
        return \redirect('contrato-ingrediente')->with('success', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Contrato_Ingrediente::findOrFail($id)->delete();
        return \redirect('contrato-ingrediente')->with('success', 'Eliminado Correctamente');
    }
}
