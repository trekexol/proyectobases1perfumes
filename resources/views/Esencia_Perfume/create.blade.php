@extends('adminlte::page')

@section('title', 'Registro de Esencia')

@section('content')
<section class="content">
    <form action="{{action('Esencia_PerfumeController@store')}}" method="post" autocomplete="off" id="empresa" enctype="multipart/form-data">    
        @csrf
  <div class="card">
        
    <div class="card-body">
        
          
        <h2>Datos Generales de la Esencia: </h2>

        <div class="row">
        <div class="col-6">
                  <div class="form-group">
                    <label for="Nombre">Tsca Cas</label>
                    <input type="text" class="form-control form-control-sm" name="tsca_cas" placeholder="tsca cas">
                  </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                    <label for="Nombre">Nombre</label>
                    <input type="text" class="form-control form-control-sm" name="nombre" placeholder="nombre">
                </div>
                </div>
                <div class="col-6">
                   <label  for="Iniciales Productor">Tipo </label> 
                                <select class="js-example-basic-multiple form-control-sm" data-placeholder="Tipo" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="tipo" id="tipo">
                                  <option data-select2-id="Natural">Natural</option>
                                  <option data-select2-id="Sintetico">Sintetico</option>
                             
                                </select>
                </div>
                
               <div class="col-6">
                        <div class="form-group">
                            <label>Familia Olfativa</label>
                            <select class="js-example-basic-multiple form-control-sm" name="familia[]" id="familia" style="width: 100%;" multiple="multiple">
                              @foreach ($familia as $p)
                                <option value="{{$p->id}}">{{$p->nombre}}</option>
                              @endforeach
                            </select>
                          </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                          <label class="text-sm">Descripcion: </label>
                          <input type="text" class="form-control form-control-sm" name="descripcion" id="descripcion" placeholder="descripcion">
                      </div>
                    </div>

              </div>
                
            </div>


            
       
        
    </div>


    <div class="card-footer">
        <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href=" {{ url('esencia') }}"  class="btn btn-danger">Cancelar</a>
        </div>
    </div>

    </div>
</form>
  </section>
@stop

@section('js')
    <script>
   
    $(document).ready(function() {
        $('#familia').select2();

        $('#tipo').select2();

       
        bsCustomFileInput.init();
        
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

