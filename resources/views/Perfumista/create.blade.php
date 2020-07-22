@extends('adminlte::page')

@section('title', 'Registro del Perfumista')

@section('content')
<section class="content">
    <form action="{{action('PerfumistaController@store')}}" method="post" autocomplete="off" id="empresa" enctype="multipart/form-data">    
        @csrf
        <div class="card">
        
    <div class="card-body">
        
          
        <h2>Datos Generales del Perfumista: </h2>

        <div class="row">
            <div class="col-6">
           <!-- <input type="hidden" name="id_productor" value="1"> -->
						        
           <div class="form-group">
                    <label class="text-sm">Primer Nombre: </label>
                    <input type="text" class="form-control form-control-sm" name="nombre_primero" id="nombre_primero" placeholder="primer nombre">
                    <span class="text-danger">{{ $errors->first('nombre_primero') }}</span>
                </div>
                <div class="form-group">
                    <label class="text-sm">Segundo Nombre: </label>
                    <input type="text" class="form-control form-control-sm" name="nombre_segundo" id="nombre_segundo" placeholder="segundo nombre">
                    <span class="text-danger">{{ $errors->first('nombre_primero') }}</span>
                </div>
                <div class="form-group">
                    <label class="text-sm">Primer Apellido: </label>
                    <input type="text" class="form-control form-control-sm" name="apellido_primero" id="apellido_primero" placeholder="primer apellido">
                    <span class="text-danger">{{ $errors->first('nombre_primero') }}</span>
                </div>
                <div class="form-group">
                    <label class="text-sm">Segundo Apellido: </label>
                    <input type="text" class="form-control form-control-sm" name="apellido_segundo" id="apellido_segundo" placeholder="segundo apellido">
                    <span class="text-danger">{{ $errors->first('apellido_primero') }}</span>
                </div>

                <div class="form-group">
                    <label for="genero" >Genero:</label>
                    <select name="genero" id="genero" class="form-control">
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                    </select>
                </div>

                
                
        </div>


        <div class="col-6">
          <h2 align="center">Pais de Nacimiento</h2>
            
            <div class="row">
            
                    <div class="col-6" align="center">
                        <div align="center" class="form-group">
                            <label>Pais</label>
                            <select  class="js-example-basic-multiple form-control-sm" name="pais" id="pais" style="width: 100%;" >
                              @foreach ($pais as $p)
                                <option value="{{$p->id}}">{{$p->nombre}}</option>
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
                <a href=" {{ url('perfumista') }}"  class="btn btn-danger">Cancelar</a>
        </div>
    </div>

    </div>
</form>
  </section>
@stop

@section('js')
    <script>
   
    $(document).ready(function() {
        $('#pais').select2();
        
        
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

