@extends('adminlte::page')

@section('title', 'Crear Renovacion')

@section('content_header')
    <h1>Crear Renovacion</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        {{-- <h1>Crear Renovacion</h1> --}}
        {{-- {{var_dump($errors)}} --}}
        <h2>Detalles Generales</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <form action="{{action('RenovacionController@store')}}" method="post" autocomplete="off" id="renovacion" enctype="multipart/form-data">
                @csrf
            <div class="example_form">
                <div class="form-group">
                    <label class="text-sm">ID del Contrato: </label>
                    <input type="number" class="form-control form-control-sm" name="id_contrato" id="id_contrato" placeholder="id_contrato">
                    <span class="text-danger">{{ $errors->first('id_contrato') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">Fecha: </label>
                    <input type="date" class="form-control form-control-sm" name="fecha" id="fecha" placeholder="fecha">
                    <span class="text-danger">{{ $errors->first('fecha') }}</span>
                </div>
               
                        <div class="form-group">
                                <button action="{{url('/')}}" type="submit" class="btn btn-primary">Guardar</button>
                                <button href=" {{ url('variable') }}" type="reset" class="btn btn-danger">Cancelar</button>
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
        $('form[id="renovacion"]').validate({
  rules: {
    id_contrato: {
        required: true,
    },
    fecha_emision: {
      required: true,
    //   email: true,
    },
  },
  messages: {
    id_contrato: 'Este campo es requerido',
    fecha_emision: 'Este campo es requerido',
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