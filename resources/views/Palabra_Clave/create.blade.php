@extends('adminlte::page')

@section('title', 'Registrar Palabra Clave')

@section('content_header')
    <h1>Registrar Palabra Clave</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        {{-- <h1>Registrar Palabra Clave</h1> --}}
        {{-- {{var_dump($errors)}} --}}
        <h2>Detalles Generales</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <form action="{{action('Palabra_ClaveController@store')}}" method="post" autocomplete="off" id="vars" enctype="multipart/form-data">
                @csrf
            <div class="example_form">
                <div class="form-group">
                    <label class="text-sm">Nombre: </label>
                    <input type="text" class="form-control form-control-sm" name="nombre" id="nombre" placeholder="Nombre">
                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                </div>

              
               
               
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href=" {{ url('palabra-clave') }}"  class="btn btn-danger">Regresar</a> 
                        </div>
              
           
            </div>      
          </div>

         
        </form>
    </div>
    
</div>

       
@endsection
