@extends('adminlte::page')

@section('title', 'Actualizar Forma Pago')

@section('content_header')
    <h1>Actualizar Forma Pago</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        {{-- <h1>Actualizar Forma Pago</h1> --}}
        <h2>Detalles Generales</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <form action="{{action('Forma_PagoController@getIndex', $fpago->id)}}" method="post" autocomplete="off">
                    @method('PUT')
                @csrf
            <div class="example_form">
            <div class="form-group">
                    <label class="text-sm">ID Proveedor: </label>
                    <input type="number" class="form-control form-control-sm" name="id_proveedor" id="id_proveedor" placeholder="id_proveedor">
                    <span class="text-danger">{{ $errors->first('id_proveedor') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">Nombre: </label>
                    <input type="text" class="form-control form-control-sm" name="nombre" id="nombre" placeholder="nombre">
                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">Tipo: </label>
                    <input type="text" class="form-control form-control-sm" name="tipo" id="tipo" placeholder="tipo">
                    <span class="text-danger">{{ $errors->first('tipo') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">Plazo de Días: </label>
                    <input type="number" class="form-control form-control-sm" name="plazo_dias" id="plazo_dias" placeholder="plazo_dias">
                    <span class="text-danger">{{ $errors->first('plazo_dias') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">Descripcion: </label>
                    <input type="text" class="form-control form-control-sm" name="descripcion" id="descripcion" placeholder="descripcion">
                    <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">Cuotas: </label>
                    <input type="number" class="form-control form-control-sm" name="cuotas" id="cuotas" placeholder="cuotas">
                    <span class="text-danger">{{ $errors->first('cuotas') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">Porcentaje Cuotas: </label>
                    <input type="number" class="form-control form-control-sm" name="porcentaje_cuotas" id="porcentaje_cuotas" placeholder="porcentaje_cuotas">
                    <span class="text-danger">{{ $errors->first('porcentaje_cuotas') }}</span>
                </div>

            </div>    
            
            </div>
          
        </div>
                </div>
                <div class="card-footer">
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                               
                              
                                <a type="reset" class="btn btn-danger" href="{{action('Forma_PagoController@getIndex')}}">
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