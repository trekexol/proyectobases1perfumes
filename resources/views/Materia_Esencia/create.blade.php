@extends('adminlte::page')

@section('title', 'Registro de Materia Esencia')

@section('content')
<section class="content">
    <form action="{{action('Materia_EsenciaController@store')}}" method="post" autocomplete="off" id="empresa" enctype="multipart/form-data">    
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
                   <label  for="Iniciales Productor">Estado </label> 
                                <select class="js-example-basic-multiple form-control-sm" data-placeholder="Estado" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="estado" id="estado">
                                  <option data-select2-id="Liquido">Liquido</option>
                                  <option data-select2-id="Solido">Solido</option>
                                  <option data-select2-id="Gaseoso">Gaseoso</option>
                             
                                </select>
                </div>
                <br>
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
                <div class="col-9">
                        <div class="form-group">
                            <label>Familia Olfativa</label>
                            <select class="js-example-basic-multiple form-control-sm" name="familia[]" id="familia" style="width: 100%;" multiple="multiple">
                              @foreach ($familia as $p)
                                <option value="{{$p->id}}">{{$p->nombre}}</option>
                              @endforeach
                            </select>
                          </div>
                    </div>
                    <div class="col-9">
                        <div class="form-group">
                            <label>Origen</label>
                            <select class="js-example-basic-multiple form-control-sm" name="origen[]" id="origen" style="width: 100%;" multiple="multiple">
                              @foreach ($pais as $p)
                                <option value="{{$p->id}}">{{$p->nombre}}</option>
                              @endforeach
                            </select>
                          </div>
                    </div>
                    
                    
             </div>      
        </div>
       
        
    </div>


    <div class="card-footer">
        <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href=" {{ url('materia-esencia') }}"  class="btn btn-danger">Cancelar</a>
        </div>
    </div>

    </div>
</form>
  </section>
@stop

@section('js')
    <script>
   
    $(document).ready(function() {
      
        $('#proveedor').select2();
        $('#familia').select2();
        $('#estado').select2();

        $('#origen').select2();
       
       
        
    });
    
    $('form[id="empresa"]').validate({
  rules: {
    nombre: {
        required: true,
        maxlength: 50,
    }
  },
  messages: {
    nombre: 'Este campo es requerido'
  },
  errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }


});


    </script>

<script>
        $(document).ready(function() {
            $("input[name$='notas']").click(function() {
                var test = $(this).val();
                $("div.desc").hide();
                $("#fases" + test).show();
            });
        });

    </script>
@endsection

