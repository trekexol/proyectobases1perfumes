@extends('adminlte::page')

@section('title', 'Edición de Ingredientes')

@section('content')
<section class="content">
    <form action="{{action('O_IngredientesController@update', $ingr->id)}}" method="post" autocomplete="off" id="ingredientes"> 
        @method('PUT')   
        @csrf
        <div class="card">
        
    <div class="card-body">
        
          
        <h2>Datos Generales del Ingrediente: </h2>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="Ingredientes">Nombre</label>
                    <input type="text" class="form-control form-control-sm" name="nombre" placeholder="Nombre Ingrediente" value="{{$ingr->nombre}}">
                </div>
        
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Ingredientes">Fórmula Química</label>
                            <input type="text" class="form-control form-control-sm" name="formula_quimica" placeholder="Fórmula Química" value="{{$ingr->formula_quimica}}">
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="Ingredientes">IPC</label>
                            <input type="text" class="form-control form-control-sm" name="ipc" placeholder="IPC" value="{{$ingr->ipc}}">
                    </div>
                </div>

                <div class="col-6">
                        <label for="Ingredientes">TSCA CAS</label>
                            <input type="text" class="form-control form-control-sm" name="tsca_cas" placeholder="TSCA CAS" value="{{$ingr->tsca_cas}}">
                    </div>
                </div>
                
            </div>

            <div class="col-6">

                    <div class="col-6">
                        <div class="form-group">
                            <label>Proveedor</label>
                            <select class="js-example-basic-single form-control-sm" name="prov" id="prov" style="width: 100%;" >
                              @foreach ($prove as $p)
                                @if ($p->id != $ingrediente_proveedor->id)
                                    <option value="{{$p->id}}">{{$p->nombre}}</option>
                                @endif
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
                <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>
    </div>

    </div>
</form>
  </section>
@stop

@section('js')
    <script>
   
    $(document).ready(function() {
        $('#prov').select2();
    });
    
    $('form[id="ingredientes"]').validate({
  rules: {
    nombre: {
        required: true,
        maxlength: 50,
    },
    formula_quimica: {
        required: true,
        maxlength: 15,
    },
    ipc: {
        required: true,
        maxlength: 30,
    },
    tsca_cas: {
        required: true,
        maxlength: 30,
    }
  },
  messages: {
    nombre: 'Este campo es requerido',
    formula_quimica: 'Este campo es requerido',
    ipc: 'Este campo es requerido',
    tsca_cas: 'Este campo es requerido',
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

