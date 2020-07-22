@extends('adminlte::page')

@section('title', 'Registrar Presentacion Perfume')

@section('content_header')
    <h1>Registrar Presentacion Perfume</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        {{-- <h1>Registrar Presentacion Perfume</h1> --}}
        {{-- {{var_dump($errors)}} --}}
        <h2>{{$perfume->nombre}}</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <form action="{{action('Perfume_PresentacionController@store', [$perfume->id, $intensidad])}}" method="post" autocomplete="off" id="variable" enctype="multipart/form-data">
                @csrf
            <div class="example_form">

            <input type="hidden" name="fk_id_perfume" value="{{$perfume->id}}">
            <input type="hidden" name="fk_id_intensidad" value="{{$intensidad}}">
						        
            <div class="col-6">
                <div class="form-group">
                    <label class="text-sm">Cantidad: </label>
                    <input type="text" class="form-control form-control-sm" name="cantidad" id="cantidad" value="1" placeholder="cantidad">
                    <span class="text-danger">{{ $errors->first('cantidad') }}</span>
                </div>
                </div>

                <div class="form-group">
                        <label  class="text-sm">Volumen</label>
                        <div class="row">
                  
                            <div class="col-2">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="radio" name="volumen" checked="" id="customCheckbox1" value="15">
                                    <label for="customCheckbox1" class="custom-control-label">10 ml</label>
                                  </div>
                            </div>

                           

                            <div class="col-2">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="radio" name="volumen" id="customCheckbox2" value="50">
                                    <label for="customCheckbox2" class="custom-control-label">50 ml</label>
                                  </div>
                            </div>

                            <div class="col-2">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="radio" name="volumen" id="customCheckbox3" value="100">
                                    <label for="customCheckbox3" class="custom-control-label">100 ml</label>
                                  </div>
                            </div>

                            <div class="col-2">
                                <div class="custom-control custom-checkbox"> 
                                    <input class="custom-control-input" type="radio" name="volumen" id="customCheckbox4" value="1000">
                                    <label for="customCheckbox4" class="custom-control-label">1000 ml</label>
                                  </div>
                            </div>
                            <div class="col-2">
                                <div class="custom-control custom-checkbox"> 
                                    <input class="custom-control-input" type="radio" name="volumen" id="customCheckbox5" value="1">
                                    <label for="customCheckbox5" class="custom-control-label">Otro</label>
                                  </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-6">
                    <div id="fases1" class="desc" style="display: none;">
                        <div class="row">
                            <div class="form-group" data-select2-id="1">
                                <label  class="text-sm">Mililitros: </label>
                                <input  class="form-control form-control-sm"   data-placeholder="Salida" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="volumen_otro" id="volumen_otro">
                                  
                            </div>
                      </div>
                    </div>
                    </div>
                
                <br><br>
               
                        <div class="form-group">
                                <button  type="submit" class="btn btn-primary">Guardar</button>
                                <a href=" {{ url('perfume') }}"  class="btn btn-danger">Ir al Menu</a>
                        </div>
              
           
            </div>      
          </div>

         
        </form>
    </div>
    
</div>

       
@endsection

@section('js')

{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> --}}
    <script>

$(document).ready(function() {
    $('#states').select2();
    $('#volumen_otro').select2();
});
        $('form[id="variable"]').validate({
  rules: {
    nombre: {
        required: true,
        minlength: 2,
    },
    etiqueta: 'required',
    descripcion: {
      required: true,
    //   email: true,
    },
  },
  messages: {
    nombre: 'Este campo es requerido',
  
    descripcion: {
        minlength: 'El nombre tiene que tener al menos dos letras'
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

    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });

    </script>

<script>
        $(document).ready(function() {
            $("input[name$='volumen']").click(function() {
                var test = $(this).val();
                $("div.desc").hide();
                $("#fases" + test).show();
            });
        });

    </script>

@stop