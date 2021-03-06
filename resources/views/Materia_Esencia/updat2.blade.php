@extends('adminlte::page')

@section('title', 'Registrar Materia Esencia')

@section('content_header')
    <h1>Registrar Materia Esencia</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        {{-- <h1>Registrar Materia Esencia</h1> --}}
        <h2>Detalles Generales</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <form action="{{action('Materia_EsenciaController@update', $var->id)}}" method="post" autocomplete="off">
                    @method('PUT')
                @csrf
              
        <div class="card">
        
    <div class="card-body">
        
          
        <h2>Datos Generales del Materia Esencia: </h2>

        <div class="row">
            <div class="col-6">
         
             <div class="col-9">     
                <div class="form-group">
                    <label class="text-sm">Nombre: </label>
                    <input type="text" class="form-control form-control-sm" name="nombre" id="nombre" placeholder="Nombre">
                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                </div>
            </div>
            <div class="col-9">
                <div class="form-group">
                    <label class="text-sm">Estado: </label>
                    <input type="text" class="form-control form-control-sm" name="estado" id="estado" placeholder="estado">
                    <span class="text-danger">{{ $errors->first('estado') }}</span>
                </div>
            </div>
            <div class="col-9">
                <div class="form-group">
                    <label class="text-sm">Parte: </label>
                    <input type="text" class="form-control form-control-sm" name="parte" id="parte" placeholder="parte">
                    <span class="text-danger">{{ $errors->first('parte') }}</span>
                </div>
            </div>
            <div class="col-9">
                <div class="form-group">
                    <label class="text-sm">Naturaleza: </label>
                    <input type="text" class="form-control form-control-sm" name="naturaleza" id="naturaleza" placeholder="naturaleza">
                    <span class="text-danger">{{ $errors->first('naturaleza') }}</span>
                </div>
            </div>
            <div class="col-9">
               <div class="form-group">
                    <label class="text-sm">IPC: </label>
                    <input type="text" class="form-control form-control-sm" name="ipc" id="ipc" placeholder="ipc">
                    <span class="text-danger">{{ $errors->first('ipc') }}</span>
                </div>
            </div>
            <div class="col-9">
                <div class="form-group">
                    <label class="text-sm">IPC Alterno: </label>
                    <input type="text" class="form-control form-control-sm" name="ipc_alter" id="ipc_alter" placeholder="ipc alterno">
                    <span class="text-danger">{{ $errors->first('ipc_alter') }}</span>
                </div>
            </div>
            <div class="col-9">
                <div class="form-group">
                    <label class="text-sm">TSCA CAS: </label>
                    <input type="text" class="form-control form-control-sm" name="tsca_cas" id="tsca_cas" placeholder="tsca_cas">
                    <span class="text-danger">{{ $errors->first('tsca_cas') }}</span>
                </div>
            </div>

                <div class="col-9">
                        <div class="form-group">
                            <label>Proveedores</label>
                            <select class="js-example-basic-multiple form-control-sm" name="proveedor" id="proveedor" style="width: 100%;">
                              @foreach ($proveedor as $p)
                                <option value="{{$p->id}}">{{$p->nombre  }}</option>
                              @endforeach
                            </select>
                          </div>
                    </div>
                
        </div>


        
        <div class="col-6">  
            <div class="row">
            
           
            <div class="col-9">
                <div class="form-group">
                    <label class="text-sm">Einecs: </label>
                    <input type="text" class="form-control form-control-sm" name="einecs" id="einecs" placeholder="einecs">
                    <span class="text-danger">{{ $errors->first('einecs') }}</span>
                </div>
            </div>
            <div class="col-9">
                <div class="form-group">
                    <label class="text-sm">Punto Ebullicion: </label>
                    <input type="text" class="form-control form-control-sm" name="punto_ebullicion" id="punto_ebullicion" placeholder="punto ebullicion">
                    <span class="text-danger">{{ $errors->first('punto_ebullicion') }}</span>
                </div>
                </div>
            <div class="col-9">
                <div class="form-group">
                    <label class="text-sm">Descripcion Visual: </label>
                    <input type="text" class="form-control form-control-sm" name="descripcion_visual" id="descripcion_visual" placeholder="descripcion visual">
                    <span class="text-danger">{{ $errors->first('descripcion_visual') }}</span>
                </div>
            </div>
            <div class="col-9">
                <div class="form-group">
                    <label class="text-sm">Tipo: </label>
                    <input type="text" class="form-control form-control-sm" name="tipo" id="tipo" placeholder="tipo">
                    <span class="text-danger">{{ $errors->first('tipo') }}</span>
                </div>
            </div>
            <div class="col-9">
                <div class="form-group">
                    <label class="text-sm">Solubilidad: </label>
                    <input type="text" class="form-control form-control-sm" name="solubilidad" id="solubilidad" placeholder="solubilidad">
                    <span class="text-danger">{{ $errors->first('solubilidad') }}</span>
                </div>
            </div>
            <div class="col-9">
                <div class="form-group">
                    <label class="text-sm">Proceso: </label>
                    <input type="text" class="form-control form-control-sm" name="proceso" id="proceso" placeholder="proceso">
                    <span class="text-danger">{{ $errors->first('proceso') }}</span>
                </div>
                </div>
                <div class="col-9">
                <div class="form-group">
                    <label class="text-sm">Descripcion Proceso: </label>
                    <input type="text" class="form-control form-control-sm" name="descproceso" id="descproceso" placeholder="descripcion proceso">
                    <span class="text-danger">{{ $errors->first('descproceso') }}</span>
                </div>
                </div>
                    
                    
             </div>      
        </div>
       
        
    </div>

                <div class="card-footer">
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                               
                              
                                <a type="reset" class="btn btn-danger" href="{{action('Materia_EsenciaController@index')}}">
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