<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Familia_Aromatica;  

class FamiliaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('ExampleCRUD.familia');
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
        $fam = new Familia_Aromatica;
        $fam->nombre = $request->get('nombre');
        $fam->descripcion = $request->get('descripcion');
        $fam->save();


        
        if ($request->get('title')) {
            $fam_class = $request->get('title');
            foreach ($fam_class as $f) {
                $fm = new Familia_Aromatica;
                $fm->nombre = $f;
                $fm->id_fam_rec = $fam->id_fam;
                $fm->save();
            }

        }

        return response()->json($fam);
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
