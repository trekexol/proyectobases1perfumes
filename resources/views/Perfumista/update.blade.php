@extends('adminlte::page')

@section('title', 'Editar Perfumista')

@section('content_header')
    <h1>Editar Perfumista</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        {{-- <h1>Editar Perfumista</h1> --}}
        <h2>Detalles Generales</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <form action="{{action('PerfumistaController@update', $var->id)}}" method="post" autocomplete="off">
                    @method('PUT')
                @csrf
            <div class="example_form">
            <div class="form-group">
                    <label class="text-sm">Primer Nombre: </label>
                    <input type="text" class="form-control form-control-sm" name="nombre_primero" value="{{$var->nombre_primero}}" id="nombre_primero" placeholder="nombre">
                    <span class="text-danger">{{ $errors->first('nombre_primero') }}</span>
                </div>
                <div class="form-group">
                    <label class="text-sm">Segundo Nombre: </label>
                    <input type="text" class="form-control form-control-sm" name="nombre_segundo" value="{{$var->nombre_segundo}}" id="nombre_segundo" placeholder="nombre">
                    <span class="text-danger">{{ $errors->first('nombre_primero') }}</span>
                </div>
                <div class="form-group">
                    <label class="text-sm">Primer Apellido: </label>
                    <input type="text" class="form-control form-control-sm" name="apellido_primero" value="{{$var->apellido_primero}}" id="apellido_primero" placeholder="nombre">
                    <span class="text-danger">{{ $errors->first('nombre_primero') }}</span>
                </div>
                <div class="form-group">
                    <label class="text-sm">Segundo Apellido: </label>
                    <input type="text" class="form-control form-control-sm" name="apellido_segundo" value="{{$var->apellido_segundo}}" id="apellido_segundo" placeholder="nombre">
                    <span class="text-danger">{{ $errors->first('apellido_primero') }}</span>
                </div>

                <div class="form-group">
                    <label for="genero" >Genero:</label>
                    <select name="genero" id="genero"  class="form-control">
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="text-sm">Pais debe estar en la url: </label>
                    <input type="text" class="form-control form-control-sm" name="id_pais" value="{{$var->id_pais}}" id="id_pais" placeholder="pais">
                    <span class="text-danger">{{ $errors->first('pais') }}</span>
                </div>

            </div>    
            
            </div>
          
        </div>
                </div>
                <div class="card-footer">
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                               
                              
                                <a type="reset" class="btn btn-danger" href="{{action('PerfumistaController@index')}}">
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