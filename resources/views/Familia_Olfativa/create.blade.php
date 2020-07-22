@extends('adminlte::page')

@section('title', 'Registro de Familia Olfativa')

@section('content')
<section class="content">
    <form action="{{action('Familia_OlfativaController@store')}}" method="post" autocomplete="off" id="empresa" enctype="multipart/form-data">    
        @csrf
        <div class="card">
        
    <div class="card-body">
        
          
        <h2>Datos Generales de la Familia Olfativa: </h2>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="Nombre Productor">Nombre</label>
                    <input type="text" class="form-control form-control-sm" name="nombre" placeholder="Nombre Productor">
                </div>
        
                <div class="form-group">
                    <label class="text-sm">Descripcion: </label>
                    <input type="text" class="form-control form-control-sm" name="descripcion" id="descripcion" placeholder="descripcion">
                </div>
                
            </div>

            <div class="col-6">

                <div class="row">
                   

                    <div class="col-6">
                        <div class="form-group">
                            <label>Palabra Clave</label>
                            <select class="js-example-basic-multiple form-control-sm" name="palabra[]" id="palabra" style="width: 100%;" multiple="multiple">
                              @foreach ($palabra as $p)
                                <option value="{{$p->id}}">{{$p->nombre}}</option>
                              @endforeach
                            </select>
                          </div>
                    </div>
                </div>

                
            </div>

        </div>

        
    </div>

    <div class="card-footer">
        <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href=" {{ url('familia-olfativa') }}"  class="btn btn-danger">Cancelar</a>
        </div>
    </div>

    </div>
</form>
  </section>
@stop

@section('js')
    <script>
   
    $(document).ready(function() {
        $('#palabra').select2();
       
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


@if(Session::has('error')) 
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
            toastr.error("{{Session::get('error')}}");
        @endif
    </script>
@endsection

