@extends('adminlte::page')

@section('title', 'Crear Example')

@section('content_header')
    <h1>Crear Example</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        {{-- <h1>Crear Obra</h1> --}}
        {{-- {{var_dump($errors)}} --}}
        <h2>Detalles Generales</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <form action="{{action('ExampleController@store')}}" method="post" autocomplete="off" id="example" enctype="multipart/form-data">
                @csrf
            <div class="example_form">
                <div class="form-group">
                    <label class="text-sm">Nombre: </label>
                    <input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="Nombre">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">Apellido: </label>
                    <input type="text" class="form-control form-control-sm" name="lastname" id="lastname" placeholder="Apellido">
                    <span class="text-danger">{{ $errors->first('lastname') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">Año de nacimiento: </label>
                    <input type="text" class="form-control form-control-sm" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Fecha Nacimiento">
                    <span class="text-danger">{{ $errors->first('fecha_nacimiento') }}</span>
                </div>
            </div>    
            
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label class="text-sm">Fecha: </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-sm" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" name="fecha">
                    </div>
                </div>

                  <div class="form-group">
                    <label>Telefono</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      </div>
                      <input type="text" class="form-control form-control-sm" data-inputmask="&quot;mask&quot;: &quot;(9999) 999-9999&quot;" data-mask="" im-insert="true" name="telefono">
                    </div>
                  </div>

                  <select class="js-example-basic-multiple" name="states[]" multiple="multiple" id="states">
                    <option value="AL">Alabama</option>
                    <option value="WY">Wyoming</option>
                  </select>
            </div>
          
        </div>
                </div>
                <div class="card-footer">
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <button type="reset" class="btn btn-danger">Cancelar</button>
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
  $('form[id="example"]').validate({
  rules: {
    name: {
        required: true,
        minlength: 2,
    },
    lastname: 'required',
    fecha_nacimiento: {
      required: true,
    //   email: true,
    },
  },
  messages: {
    name: 'Este campo es requerido',
    lastname: 'Este campo es requerido',
    fecha_nacimiento: 'Este campo es requerido',
    name: {
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