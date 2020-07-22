@extends('adminlte::page')

@section('title', 'Actualizar Forma Envio')

@section('content_header')
    <h1>Actualizar Forma Envio</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        {{-- <h1>Actualizar Forma Envio</h1> --}}
        <h2>Detalles Generales</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
<<<<<<< HEAD
                <form action="{{action('Forma_EnvioController@getIndex', $envio->id)}}" method="post" autocomplete="off">
=======
                <form action="{{action('VariableController@getIndex', $variable->id_variable)}}" method="post" autocomplete="off">
>>>>>>> 3bbc3d76c4f39d60c685f25c520ae776f7916efa
                    @method('PUT')
                @csrf
            <div class="example_form">
            <div class="form-group">
<<<<<<< HEAD
                    <label class="text-sm">ID Proveedor: </label>
                    <input type="number" class="form-control form-control-sm" name="id_proveedor" id="id_proveedor" placeholder="id_proveedor">
                    <span class="text-danger">{{ $errors->first('id_proveedor') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">ID País: </label>
                    <input type="number" class="form-control form-control-sm" name="id_pais" id="id_pais" placeholder="id_pais">
                    <span class="text-danger">{{ $errors->first('id_pais') }}</span>
=======
                    <label class="text-sm">Tiempo Envio: </label>
                    <input type="text" class="form-control form-control-sm" name="tiempo_envio" id="tiempo_envio" placeholder="tiempo_envio">
                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
>>>>>>> 3bbc3d76c4f39d60c685f25c520ae776f7916efa
                </div>

                <div class="form-group">
                    <label class="text-sm">Transporte: </label>
                    <input type="text" class="form-control form-control-sm" name="transporte" id="transporte" placeholder="transporte">
                    <span class="text-danger">{{ $errors->first('transporte') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">Coste: </label>
                    <input type="number" class="form-control form-control-sm" name="coste" id="coste" placeholder="coste">
<<<<<<< HEAD
                    <span class="text-danger">{{ $errors->first('coste') }}</span>
=======
                    <span class="text-danger">{{ $errors->first('region') }}</span>
>>>>>>> 3bbc3d76c4f39d60c685f25c520ae776f7916efa
                </div>

                <div class="form-group">
                    <label class="text-sm">Extras: </label>
                    <input type="text" class="form-control form-control-sm" name="extras" id="extras" placeholder="extras">
                    <span class="text-danger">{{ $errors->first('extras') }}</span>
                </div>

            </div>    
            
            </div>
          
        </div>
                </div>
                <div class="card-footer">
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                               
                              
<<<<<<< HEAD
                                <a type="reset" class="btn btn-danger" href="{{action('Forma_EnvioController@getIndex')}}">
=======
                                <a type="reset" class="btn btn-danger" href="{{action('VariableController@getIndex')}}">
>>>>>>> 3bbc3d76c4f39d60c685f25c520ae776f7916efa
                                    Regresar
                                </a>

                        </div>
                </div>
            </form>
    </div>
    
</div>

       
@endsection

@section('js')
 
@stop