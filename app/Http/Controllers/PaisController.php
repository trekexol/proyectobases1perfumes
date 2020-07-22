<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pais;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->get('buscar');

        if ($name == '') {
            $pais = null;
            return \view('Inserts.pais_example', \compact('pais'));
        } 
        else if ($name != '') {
            $pais = pais::OrderBy('id')
            ->name($name)
            ->paginate(3);

            return \view('Inserts.pais_example', \compact('pais'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('Inserts.insets_pais');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pais = new pais();
        $data = $request->all();
        $pais->nombre = $request->get('nombre');
        $pais->save();
        return \redirect('/inserts/pais/create')->with('success', 'Agregado Correctamente');
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
