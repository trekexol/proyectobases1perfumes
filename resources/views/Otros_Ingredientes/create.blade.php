@extends('adminlte::page')

@section('title', 'Registro de Ingrediente')

@section('content')
<section class="content">
    <form action="{{action('Otros_IngredientesController@store')}}" method="post" autocomplete="off" id="empresa" enctype="multipart/form-data">    
        @csrf
        <div class="card">
        
    <div class="card-body">
        
          
        <h2>Datos Generales del Ingrediente: </h2>

        <div class="row">
            <div class="col-6">
           <!-- <input type="hidden" name="id_productor" value="1"> -->
						        
           <div class="form-group">
                    <label class="text-sm">Nombre: </label>
                    <input type="text" class="form-control form-control-sm" name="nombre" id="nombre" placeholder="nombre">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">Formula Quimica: </label>
                    <input type="text" class="form-control form-control-sm" name="formula_quimica" id="formula_quimica" placeholder="formula quimica">
                    <span class="text-danger">{{ $errors->first('formula_quimica') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">Ipc: </label>
                    <input type="text" class="form-control form-control-sm" name="ipc" id="ipc" placeholder="ipc">
                    <span class="text-danger">{{ $errors->first('ipc') }}</span>
                </div>

                <div class="form-group">
                    <label class="text-sm">Tsca Cas: </label>
                    <input type="text" class="form-control form-control-sm" name="tsca_cas" id="tsca_cas" placeholder="tsca cas">
                    <span class="text-danger">{{ $errors->first('tsca_cas') }}</span>
                </div>
           
                
        </div>


        <div class="col-6">
          <h2 align="center">Intensidad Aromatica</h2>
            
            <div class="row">
                      

                    <div class="col-6">
                        <div class="form-group">
                            <label>Materia Esencias</label>
                            <select class="js-example-basic-multiple form-control-sm" name="materia[]" id="materia" style="width: 100%;" multiple="multiple">
                              @foreach ($materia as $p)
                                <option value="{{$p->id}}">{{$p->ipc}} - {{$p->nombre  }}</option>
                              @endforeach
                            </select>
                          </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Proveedores</label>
                            <select class="js-example-basic-multiple form-control-sm" name="proveedor" id="proveedor" style="width: 100%;">
                              @foreach ($proveedor as $p)
                                <option value="{{$p->id}}">{{$p->nombre  }}</option>
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
                <a href=" {{ url('ingredientes') }}"  class="btn btn-danger">Cancelar</a>
        </div>
    </div>

    </div>
</form>
  </section>
@stop

@section('js')
    <script>
   
    $(document).ready(function() {
       
        $('#materia').select2();
        $('#proveedor').select2();
        
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

