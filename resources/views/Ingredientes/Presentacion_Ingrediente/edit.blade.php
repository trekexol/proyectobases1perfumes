@extends('adminlte::page')

@section('title', 'Edición de Presentación de Ingredientes')

@section('content')
<section class="content">
    <form action="{{action('P_IngredientesController@update, $ingr->pc')}}" method="post" autocomplete="off" id="ingredientes">    
        @method('PUT')
        @csrf
        <div class="card">
        
    <div class="card-body">
        
          
        <h2>Datos Generales de la Presentación: </h2>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="Ingredientes">Precio</label>
                    <input type="text" class="form-control form-control-sm" name="precio" placeholder="Precio" value="{{$ingr->precio}}">
                    <span class="text-danger">{{ $errors->first('precio') }}</span>
                </div>
        
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Ingredientes">Volumen</label>
                            <input type="text" class="form-control form-control-sm" name="volumen_ml" placeholder="Volumen (ml)" value="{{$ingr->volumen_ml}}">
                            <span class="text-danger">{{ $errors->first('volumen_ml') }}</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label>Materia Prima</label>
                            <select class="js-example-basic-single form-control-sm" name="mat" id="mat" style="width: 100%;" >
                              @foreach ($mat as $m)
                                @if ($m->id != $pres_ingr->id_materia)
                                    <option value="{{$m->id}}">{{$m->nombre}}</option>
                                @endif
                              @endforeach
                            </select>
                          </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label>Otros Ingredientes</label>
                            <select class="js-example-basic-single form-control-sm" name="otr" id="otr" style="width: 100%;" >
                              @foreach ($otr as $o)
                              @if ($o->id != $pres_ingr->id_otros_ingredientes)
                                <option value="{{$o->id}}">{{$o->nombre}}</option>
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
        $('#mat').select2();
        $('#otr').select2();
    });
    
    $('form[id="ingredientes"]').validate({
  rules: {
    precio: {
            required: true,
            number: true,
    },
    volumen_ml: {
            required: true,
            number: true,
    }
  },
  messages: {
    precio: 'Este campo es requerido',
    volumen_ml: 'Este campo es requerido',
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

