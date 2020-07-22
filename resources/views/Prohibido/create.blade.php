@extends('adminlte::page')

@section('title', 'Registro de Prohibidos')

@section('content')
<section class="content">
    <form action="{{action('ProhibidoController@store')}}" method="post" autocomplete="off" id="prohibido" enctype="multipart/form-data">    
        @csrf
        <div class="card">
        
    <div class="card-body">
        
          
        <h2>Datos Generales del Prohibido: </h2>

        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label for="Prohibido">TSCA CAS</label>
                    <input type="text" class="form-control form-control-sm" name="tsca_cas" placeholder="TSCA CAS">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="Prohibido">Nombre</label>
                    <input type="text" class="form-control form-control-sm" name="nombre" placeholder="Nombre Prohibido">
                </div>

            </div>

            <div class="col-3">
              <div class="form-group">
                  <label for="Prohibido">TSCA CAS</label>
                  <input type="text" class="form-control form-control-sm" name="tsca_cas" placeholder="Tsca cas">
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
  </section>
@stop

@section('js')
    <script>
    
    $('form[id="prohibido"]').validate({
  rules: {
    nombre: {
        required: true,
        maxlength: 50,
    },
    tsca_cas: {
        required: true,
        number: true,
    },
  },
  messages: {
    nombre: 'Este campo es requerido',
    },
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


@if(Session::has('success')) 
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error("{{Session::get('success')}}");
        @endif
    </script>
@endsection

