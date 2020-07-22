@extends('adminlte::page')

@section('title', 'Actualizar Esencia')

@section('content_header')
    <h1>Actualizar Esencia</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        {{-- <h1>Actualizar Esencia</h1> --}}
        <h2>Detalles Generales</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <form action="{{action('Esencia_PerfumeController@update', $var->tsca_cas)}}" method="post" autocomplete="off">
                    @method('PUT')
                @csrf
            <div class="example_form">
            <div class="form-group">
                    <label class="text-sm">Nombre: </label>
                    <input type="text" class="form-control form-control-sm" name="nombre" value="{{$var->nombre}}" id="nombre" placeholder="Nombre">
                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                </div>

                <div class="form-group">
                    <label for="tipo" >Tipo:</label>
                    <input type="text" class="form-control form-control-sm" name="tipo" value="{{$var->tipo}}" placeholder="tipo">
                
                </div>
                
                <div class="form-group">
                    <label class="text-sm">Descripcion: </label>
                    <input type="text" class="form-control form-control-sm" name="descripcion" value="{{$var->descripcion}}" id="descripcion" placeholder="descripcion">
                </div>

            </div>

            <div class="col-6">
                        <div class="form-group">
                            <label>Familia Olfativa</label>
                            <select class="js-example-basic-multiple form-control-sm" name="esencia_familia[]" id="esencia_familia" style="width: 100%;" multiple="multiple">
                              @foreach ($esencia_familia as $p)
                                <option value="{{$p->id}}">{{$p->nombre}}</option>
                              @endforeach
                            </select>
                          </div>
                    </div>
          
        </div>
                </div>
                <div class="card-footer">
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                               
                              
                                <a type="reset" class="btn btn-danger" href="{{action('Esencia_PerfumeController@index')}}">
                                    Regresar
                                </a>

                        </div>
                </div>
            </form>
    </div>
    
</div>

       


@stop

@section('js')
    <script>
   
    $(document).ready(function() {
        $('#esencia_familia').select2();
        
       
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


@endsection

