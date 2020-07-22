@extends('adminlte::page')

@section('title', 'Crear Example')

@section('content_header')
    <h1>Crear Example</h1>
@stop

@section('content')
<form action="{{action('ExampleController@update', $example->pk)}}" method="post" autocomplete="off">
    {{-- @method('PUT') --}}
    @csrf
<div class="card">
    <div class="card-header">
        {{-- <h1>Crear Obra</h1> --}}
        <h2>Detalles Generales</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
      
            <div class="example_form">
                <div class="form-group">
                    <label>Nombre: </label>
                    <input type="text" class="form-control form-control-sm" name="name" value="{{$example->name}}" id="name" placeholder="Nombre">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>

                <div class="form-group">
                    <label>Apellido: </label>
                    <input type="text" class="form-control form-control-sm" name="lastname" value="{{$example->lastname}}" id="lastname" placeholder="Apellido">
                    <span class="text-danger">{{ $errors->first('lastname') }}</span>
                </div>

                <div class="form-group">
                    <label>Año de nacimiento: </label>
                    <input type="text" class="form-control form-control-sm" name="fecha_nacimiento" value="{{$example->fecha_nacimiento}}" id="fecha_nacimiento" placeholder="Fecha Nacimiento">
                    <span class="text-danger">{{ $errors->first('fecha_nacimiento') }}</span>
                </div>
            </div>    
            
            </div>
          
        </div>
                </div>
                <div class="card-footer">
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <button type="reset" class="btn btn-danger">Cancelar</button>
                        </div>
                </div>
    
    </div>
</form>
</div>

       
@endsection

@section('js')
 
@stop