<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Example;
use Validator, Response;
use DB;

class ExampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $search = trim($request->get('search'));
            $examples = DB::select('select from "Example" where nombre='.$search.' or id='.$search.' ');
            //$examples = Example::paginate(5);
            return \view('ExampleCRUD.result', \compact('examples', 'search'));
        } catch (\Throwable $th) {
            //throw $th;
        }
            return \view('ExampleCRUD.index', \compact('search'));
           // return 'hola';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('ExampleCRUD.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $example = new Example();
        //$example->pk = DB::raw('nexval("Example_pk_seq")');
        $example->name = $request->get('name');
        $example->lastname = $request->get('lastname');
        $example->fecha_nacimiento = $request->get('fecha_nacimiento');
        // $example->test = $request->get('states');
        // $example->fecha = $request->get('fecha');
        // $example->telefono = $request->get('telefono');
        $check = request()->validate([
            'name' => 'required',
            'lastname' => 'required',
            'fecha_nacimiento' => 'required'
        ]);
        
        $example->save();
        // return response()->json($example);
        return \redirect('exampleCRUD')->with('success', 'Guardado Correctamente');
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
        $example = Example::findOrFail($id);
        return \view('ExampleCRUD.update', \compact('example'));
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
        $example = Example::findOrFail($id);
        $example->name = $request->name;
        $example->lastname = $request->lastname;
        $example->fecha_nacimiento = $request->fecha_nacimiento;
        $example->update();
        return \redirect('exampleCRUD/index')->with('success', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Example::findOrFail($id)->delete();
        return \redirect('exampleCRUD/index')->with('success', 'Eliminado Correctamente');
    }
}
