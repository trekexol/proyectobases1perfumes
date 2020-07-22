@extends('adminlte::page')

@section('title', 'Editar Renovacion')

@section('content_header')
    <h1>Editar Renovacion</h1>
@stop 

@section('content')
<div class="card">
    <div class="card-header">
        {{-- <h1>Editar Renovacion</h1> --}}
        <h2>Detalles Generales</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <form action="{{action('RenovacionController@update', $renovacion->id)}}" method="post" autocomplete="off">
                    @method('PUT')
                @csrf
            <div class="example_form">
            <div class="form-group">
                    <label class="text-sm">ID del Contrato: </label>
                    <input type="number" class="form-control form-control-sm" name="id_contrato" value="{{$renovacion->id_contrato}}" id="id_contrato" placeholder="ID contrato">
                    <span class="text-danger">{{ $errors->first('id_contrato') }}</span>
                </div>
                <div class="form-group">
                    <label class="text-sm">Fecha: </label>
                    <input type="date" class="form-control form-control-sm" name="fecha" value="{{$renovacion->fecha}}" id="fecha" placeholder="dd/mm/yyyy">
                    <span class="text-danger">{{ $errors->first('fecha') }}</span>
                </div>

            </div>    
            
            </div>
          
        </div>
                </div>
                <div class="card-footer">
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                               
                              
                                <a type="reset" class="btn btn-danger" href="{{action('RenovacionController@index')}}">
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