@extends('adminlte::page')

@section('title', 'Crear Materia Esencia')

@section('content_header')
    <h1>Registrar Materia Esencia</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        {{-- <h1>Registrar Materia Esencia</h1> --}}
        {{-- {{var_dump($errors)}} --}}
        <h2>Detalles Generales</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <form action="{{action('Materia_EsenciaController@store')}}" method="post" autocomplete="off" id="variable" enctype="multipart/form-data">
                @csrf
            <div class="example_form">
                <div class="form-group">
                    <label class="text-sm">Nombre: </label>
                    <input type="text" class="form-control form-control-sm" name="nombre" id="nombre" placeholder="Nombre">
                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">Estado: </label>
                    <input type="text" class="form-control form-control-sm" name="estado" id="estado" placeholder="estado">
                    <span class="text-danger">{{ $errors->first('estado') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">Parte: </label>
                    <input type="text" class="form-control form-control-sm" name="parte" id="parte" placeholder="parte">
                    <span class="text-danger">{{ $errors->first('parte') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">Naturaleza: </label>
                    <input type="text" class="form-control form-control-sm" name="naturaleza" id="naturaleza" placeholder="naturaleza">
                    <span class="text-danger">{{ $errors->first('naturaleza') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">Punto Ebullicion: </label>
                    <input type="text" class="form-control form-control-sm" name="punto_ebullicion" id="punto_ebullicion" placeholder="punto ebullicion">
                    <span class="text-danger">{{ $errors->first('punto_ebullicion') }}</span>
                </div>


                <div class="form-group">
                    <label class="text-sm">IPC: </label>
                    <input type="text" class="form-control form-control-sm" name="ipc" id="ipc" placeholder="ipc">
                    <span class="text-danger">{{ $errors->first('ipc') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">IPC Alterno: </label>
                    <input type="text" class="form-control form-control-sm" name="ipc_alter" id="ipc_alter" placeholder="ipc alterno">
                    <span class="text-danger">{{ $errors->first('ipc_alter') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">TSCA CAS: </label>
                    <input type="text" class="form-control form-control-sm" name="tsca_cas" id="tsca_cas" placeholder="tsca_cas">
                    <span class="text-danger">{{ $errors->first('tsca_cas') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">Einecs: </label>
                    <input type="text" class="form-control form-control-sm" name="einecs" id="einecs" placeholder="einecs">
                    <span class="text-danger">{{ $errors->first('einecs') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">Descripcion Visual: </label>
                    <input type="text" class="form-control form-control-sm" name="descripcion_visual" id="descripcion_visual" placeholder="descripcion visual">
                    <span class="text-danger">{{ $errors->first('descripcion_visual') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">Tipo: </label>
                    <input type="text" class="form-control form-control-sm" name="tipo" id="tipo" placeholder="tipo">
                    <span class="text-danger">{{ $errors->first('tipo') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">Solubilidad: </label>
                    <input type="text" class="form-control form-control-sm" name="solubilidad" id="solubilidad" placeholder="solubilidad">
                    <span class="text-danger">{{ $errors->first('solubilidad') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">Proceso: </label>
                    <input type="text" class="form-control form-control-sm" name="proceso" id="proceso" placeholder="proceso">
                    <span class="text-danger">{{ $errors->first('proceso') }}</span>
                </div>
           
                <div class="form-group">
                    <label class="text-sm">Descripcion Proceso: </label>
                    <input type="text" class="form-control form-control-sm" name="descproceso" id="descproceso" placeholder="descripcion proceso">
                    <span class="text-danger">{{ $errors->first('descripcion_proceso') }}</span>
                </div>

               
                        <div class="form-group">
                                <button  type="submit" class="btn btn-primary">Guardar</button>
                                <button href=" {{ url('materia-esencia') }}" type="reset" class="btn btn-danger">Cancelar</button>
                        </div>
              
           
            </div>      
          </div>

         
        </form>
    </div>
    
</div>

       
@endsection

@section('js')

{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> --}}
    <script>

$(document).ready(function() {
    $('#states').select2();
});
        $('form[id="variable"]').validate({
  rules: {
    nombre: {
        required: true,
        minlength: 2,
    },
    etiqueta: 'required',
    descripcion: {
      required: true,
    //   email: true,
    },
  },
  messages: {
    nombre: 'Este campo es requerido',
    etiqueta: 'Este campo es requerido',
    fecha_nacimiento: 'Este campo es requerido',
    descripcion: {
        minlength: 'El nombre tiene que tener al menos dos letras'
      }
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

    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });

    </script>

    <script>

    </script>
@stop