@extends('adminlte::page')

@section('title', 'Registro de Materia Esencia')

@section('content')
<section class="content">
    <form action="{{action('MateriaEsenciaController@store')}}" method="post" autocomplete="off" id="esencia" enctype="multipart/form-data">    
        @csrf
        <div class="card">
        
    <div class="card-body">
        
          
        <h2>Datos Generales de Materia Esencia: </h2>

        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="Prohibido">Nombre</label>
                    <input type="text" class="form-control form-control-sm" name="nombre" placeholder="Nombre Prohibido">
                </div>

                <div class="form-group">
                    <label for="Prohibido">Descripcion Visual</label>
                    <input type="text" class="form-control form-control-sm" name="descripcion_visual" placeholder="Descripcion Visual">
                </div>


                <div class="form-group">
                    <label for="Prohibido">Punto de Embullicion</label>
                    <input type="text" class="form-control form-control-sm" name="embullicion" placeholder="Punto Embullicion">
                </div>

                <div class="form-group">
                    <label for="Prohibido">Estado</label>
                    <input type="text" class="form-control form-control-sm" name="estado" placeholder="Estado">
                </div>


                <div class="form-group">
                    <label>Pais</label>
                    <select class="js-example-basic-multiple form-control-sm" name="pais[]" id="pais" style="width: 100%;" multiple="multiple">
                      @foreach ($pais as $p)
                        <option value="{{$p->id}}">{{$p->nombre}}</option>
                      @endforeach
                    </select>
                  </div>
                     

                  <div class="form-group">
                    <label>Otros Componentes</label>
                    <select class="js-example-basic-multiple form-control-sm" name="otros[]" id="otros" style="width: 100%;" multiple="multiple">
                      @foreach ($otros as $o)
                        <option value="{{$o->id}}">{{$o->nombre}}</option>
                      @endforeach
                    </select>
                  </div>
                
            </div>

            <div class="col-4">
              <div class="form-group">
                  <label for="Prohibido">IPC</label>
                  <input type="text" class="form-control form-control-sm" name="ipc" placeholder="IPC">
              </div>
              
              <div class="form-group">
                <label for="Prohibido">Tipo</label>
                <input type="text" class="form-control form-control-sm" name="tipo" placeholder="Tipo">
            </div>

            <div class="form-group">
                <label for="Prohibido">Solubilidad</label>
                <input type="text" class="form-control form-control-sm" name="solubilidad" placeholder="Solubilidad">
            </div>

            <div class="form-group">
                <label for="Prohibido">Proceso</label>
                <input type="text" class="form-control form-control-sm" name="nombre" placeholder="Proceso">
            </div>

            <div class="form-group">
                <label for="Prohibido">Descripcion Proceso</label>
                <input type="text" class="form-control form-control-sm" name="nombre" placeholder="Descripcion Proceso">
            </div>

          </div>

          <div class="col-4">
            <div class="form-group">
                <label for="Prohibido">IPC Alter</label>
                <input type="text" class="form-control form-control-sm" name="ipc_alter" placeholder="IPC ALTER">
            </div>

            <div class="form-group">
                <label for="Prohibido">EINECS</label>
                <input type="text" class="form-control form-control-sm" name="einecs" placeholder="EINECS">
            </div>

            <div class="form-group">
                <label for="">TSCA CAS</label>
                <input type="text" class="form-control form-control-sm" name="tsca_cas" placeholder="TSCA CAS">
            </div>
            

            <div class="form-group">
                <label for="Prohibido">Parte</label>
                <input type="text" class="form-control form-control-sm" name="parte" placeholder="Parte">
            </div>

            <div class="form-group">
                <label for="Prohibido">Naturaleza</label>
                <input type="text" class="form-control form-control-sm" name="naturaleza" placeholder="Naturaleza">
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

  <script>
      $(document).ready(function() {
        $('#pais').select2();
        $('#otros').select2();
    });
  </script>
@stop

@section('js')
    <script>
    
    


    $('form[id="esencia"]').validate({
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

