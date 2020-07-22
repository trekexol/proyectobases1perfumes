@extends('adminlte::page')

@section('title', 'Actualizar Palabra Clave')

@section('content_header')
    <h1>Actualizar Palabra Clave</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        {{-- <h1>Actualizar Palabra Clave</h1> --}}
        <h2>Detalles Generales</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <form action="{{action('Palabra_ClaveController@update', $var->id)}}" method="post" autocomplete="off">
                    @method('PUT')
                @csrf
            <div class="example_form">
                <div class="form-group">
                        <label class="text-sm">Nombre: </label>
                        <input type="text" class="form-control form-control-sm" name="nombre" value="{{$var->nombre}}" id="nombre" placeholder="Nombre">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>

            </div>    
            
            </div>
          
        </div>
                </div>
                <div class="card-footer">
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                               
                              
                                <a type="reset" class="btn btn-danger" href="{{action('Palabra_ClaveController@index')}}">
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