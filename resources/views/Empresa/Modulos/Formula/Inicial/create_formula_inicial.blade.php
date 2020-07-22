@extends('adminlte::page')

@section('title', 'Productor')

@section('content_header')
    <div class="row">
        <div class="col-6">
            <h1>Empresa -
                 {{$productor->nombre}}
                </h1>
        </div>
        <div class="col-6">
            
           
        </div>
    </div>
    @include('Producto.Fragancia.delete')
    
@stop

@section('content')
    {{-- {{action('ExampleController@store')}} --}}
                <form action="{{ action('CriterioInicialController@store', $productor->id) }}" method="post" autocomplete="off" id="criterio">
                @csrf
                {{-- <section class="content"> --}}

                  <div class="row">

                    <div class="col-3">
                      @include('Empresa.Productor.productor_menu')
                    </div>

                    <div class="col-9">
                         <!-- Default box -->
                    <div class="card card-solid">
                        <div class="card-title">
                            <h2>Asignacion de Criterios a Formula</h2>
                        </div>
                      <div class="card-body">

                        <div id="input_fields_wrap">
                            <div>
                                <a class="btn btn-info btn-sm" id="add_field_button">
                                    <i class="fas fa-plus">
                                        <span>Nuevo Criterio</span>
                                    </i>
                                </a>
                                <div class="row">
                                    <div class="col-3">
                                        <input class="form-control form-control-sm" type="text" placeholder="nombre" name="nombre_criterio[]">
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control form-control-sm" type="text" placeholder="etiqueta" name="etiqueta_criterio[]">
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control form-control-sm" type="text" placeholder="descripcion" name="descripcion_criterio[]">
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control form-control-sm" type="text" placeholder="peso" name="peso[]">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <h5>Criterio de Exito</h5>
                        <div class="row">
                            <div class="col-3">
                                <input class="form-control form-control-sm" type="text" placeholder="nombre" name="nombre_criterio_exito">
                            </div>
                            <div class="col-3">
                                <input class="form-control form-control-sm" type="text" placeholder="etiqueta" name="etiqueta_criterio_exito">
                            </div>
                            <div class="col-3">
                                <input class="form-control form-control-sm" type="text" placeholder="descripcion" name="descripcion_criterio_exito">
                            </div>
                            <div class="col-3">
                                <input class="form-control form-control-sm" type="text" placeholder="peso" name="peso_exito">
                            </div>
                        </div>

                        <h5>Escala</h5>
                        <div class="row">
                            <div class="col-3">
                                <input class="form-control form-control-sm" type="text" placeholder="inicial" name="escala_inicial">
                            </div>
                            <div class="col-3">
                                <input class="form-control form-control-sm" type="text" placeholder="final" name="escala_final">
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
                      <!-- /.card-body -->
                      
                    </div>
                    <!-- /.card -->
                    </div>

                  </div>
              
                {{-- </section> --}}

            </form>

      
@endsection


@section('js')
<script type="text/javascript">
   $(document).ready(function() {
	var max_fields      = 5; //maximum input boxes allowed
	var wrapper   		= $("#input_fields_wrap"); //Fields wrapper
	var add_button      = $("#add_field_button"); //Add button ID
    var input1 = '<div class="col-3"><input class="form-control form-control-sm" type="text" placeholder="nombre" name="nombre_criterio[]"></div>';
    var input2 = '<div class="col-3"><input class="form-control form-control-sm" type="text" placeholder="etiqueta" name="etiqueta_criterio[]"> </div>';
    var input3 = '<div class="col-3"><input class="form-control form-control-sm" type="text" placeholder="descripcion" name="descripcion_criterio[]"></div>';
    var input4 = '<div class="col-3"><input class="form-control form-control-sm" type="text" placeholder="peso" name="peso[]"></div>';
    var juntos = '<div class="row">' + input1.concat(input2, input3, input4) + '</div>';
    var addHTML = '<div>'+ juntos +'<a href="#" class="remove_field">Remove</a></div>';
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append(addHTML); //add input box
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	})
});
    
    $('form[id="criterio"]').validate({
  rules: {
    nombre: {
        required: true,
        maxlength: 50,
    },
    direccion: {
        required: true,
        maxlength: 100,
    },
    url: {
        required: true,
        url: true,
    },
    codigo_postal: {
        required: true,
        number: true,
    }
  },
  messages: {
    nombre: 'Este campo es requerido',
    direccion: 'Este campo es requerido',
    url: {
        required: 'Este campo es requerido',
        url: 'Introduzca una url valida',
    },
    codigo_postal: {
        number: 'Solo acepta numeros'
      }
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