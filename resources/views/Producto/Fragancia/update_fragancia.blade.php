@extends('adminlte::page')

@section('title', 'Actualizar Fragancia')

@section('content_header')
    <h1>Actualizar Fragancia</h1>
@stop

@section('content')
<div class="card">
    <form action="{{action('FraganciaController@update', 1)}}" method="post" autocomplete="off" id="validate" enctype="multipart/form-data">
        @method('PUT')
        @csrf
    <div class="card-header">
        <h2>Detalles Generales</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                
                {{-- <div class="validate"> --}}
                    <div class="form-group">
                        <label for="imagen" class="text-sm">Agregar Imagen</label>
                    <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="imagen" name="imagen">
                          <label class="custom-file-label" for="imagen">Elegir Imagen</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="text-sm">Nombre Fragancia: </label>
                        <input type="text" class="form-control form-control-sm" name="nombre" id="nombre" placeholder="Nombre Fragancia">
                        <span class="text-danger">{{ $errors->first('nombre') }}</span>
                    </div>
    
                    <div class="form-group">
                        <label class="text-sm">Descripcion: </label>
                        <input type="text" class="form-control form-control-sm" name="descripcion" id="descripcion" placeholder="Descripcion">
                        <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                    </div>
                {{-- </div>     --}}
    
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="text-sm">Min Edad: </label>
                            <input type="text" class="form-control form-control-sm" name="min_edad" id="min_edad" placeholder="Min edad">
                            <span class="text-danger">{{ $errors->first('min_edad') }}</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="text-sm">Max Edad: </label>
                            <input type="text" class="form-control form-control-sm" name="max_edad" id="max_edad" placeholder="Max edad">
                            <span class="text-danger">{{ $errors->first('max_edad') }}</span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-4">
                <div class="form-group">
                    <label class="text-sm">Genero</label>
                    <select class="custom-select">
                      <option value="masculino">Masculino</option>
                      <option value="femenino">Femenino</option>
                      <option value="unisex">Unisex</option>
                    </select>
                  </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label class="text-sm">Precio: </label>
                            <input type="text" class="form-control form-control-sm" name="precio" id="precio" placeholder="Precio base">
                            <span class="text-danger">{{ $errors->first('precio') }}</span>
                        </div>
                        <div class="col-6">
                            <label class="text-sm">Perfumista</label>
                            <select class="custom-select custom-select-sm" name="perfumista" id="perfumista">
                                <option value="Calorina Herrera">Calorina Herrera</option>
                                <option value="Calvin Klein">Calvin Klein</option>
                                <option value="Paco no se que wea">Paco no se que wea</option>
                            </select>
                        </div>
                    </div>
                </div>

                  <div class="form-group" data-select2-id="38" id="test">
                    <label  class="text-sm">Ingredientes</label>
                    <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Ingredientes" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true" name="ingredientes[]" id="ingredientes">
                      <option data-select2-id="40">Alabama</option>
                      <option data-select2-id="41">Alaska</option>
                      <option data-select2-id="42">California</option>
                      <option data-select2-id="43">Delaware</option>
                      <option data-select2-id="44">Tennessee</option>
                      <option data-select2-id="45">Texas</option>
                      <option data-select2-id="46">Washington</option>
                    </select>
                    </div>


                    <div class="form-group">
                        <label  class="text-sm">Volumen</label>
                        <div class="row">
                  
                            <div class="col-3">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="volumen[]" id="customCheckbox1" value="15">
                                    <label for="customCheckbox1" class="custom-control-label">10 ml</label>
                                  </div>
                            </div>

                            <div class="col-3">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="volumen[]" id="customCheckbox2" value="50">
                                    <label for="customCheckbox2" class="custom-control-label">50 ml</label>
                                  </div>
                            </div>

                            <div class="col-3">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="volumen[]" id="volumen3" value="100">
                                    <label for="volumen3" class="custom-control-label">100 ml</label>
                                  </div>
                            </div>

                            <div class="col-3">
                                <div class="custom-control custom-checkbox"> 
                                    <input class="custom-control-input" type="checkbox" name="volumen[]" id="customCheckbox4" value="1000">
                                    <label for="customCheckbox4" class="custom-control-label">1000 ml</label>
                                  </div>
                            </div>
                        </div>
                    </div>

            </div>

            <div class="col-4">
                <div class="form-group">
                    <label class="text-sm">Estructura de la Fragancia: </label>
                    <div class="row">

                        <div class="col-6">

                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio1" name="estructura"  checked="" value="2">
                                <label for="customRadio1" class="custom-control-label">Monolitica</label>
                            </div>
                            

                        </div>

                        <div class="col-6">

                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="estructura" name="estructura"  value="1" >
                                <label for="estructura" class="custom-control-label" >Por fases</label>
                            </div>

                        </div>
                    </div>
                    <div id="fases2" class="desc" style="display: none;">
                       
                    </div>
                    <div id="fases1" class="desc" style="display: none;">
                        <div class="row">
                            <div class="form-group" data-select2-id="1">
                                <label  class="text-sm">Notas de salida: </label>
                                <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Salida" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="salidas[]" id="salidas">
                                  <option data-select2-id="14">Alabama</option>
                                  <option data-select2-id="15">Alaska</option>
                                  <option data-select2-id="16">California</option>
                                  <option data-select2-id="17">Delaware</option>
                                  <option data-select2-id="18">Tennessee</option>
                                  <option data-select2-id="19">Texas</option>
                                  <option data-select2-id="20">Washington</option>
                                </select>
                            </div>

                                <div class="form-group" data-select2-id="2">
                                    <label  class="text-sm">Notas de Corazon</label>
                                    <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Corazon" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true" name="corazon[]" id="corazon">
                                      <option data-select2-id="0" value="0">Alabama</option>
                                      <option data-select2-id="1" value="1">Alaska</option>
                                      <option data-select2-id="2" value="2">California</option>
                                      <option data-select2-id="3" value="3">Delaware</option>
                                      <option data-select2-id="4" value="4">Tennessee</option>
                                      <option data-select2-id="5" value="5">Texas</option>
                                      <option data-select2-id="6" value="6">Washington</option>
                                    </select>
                                </div>

                                    <div class="form-group" data-select2-id="3">
                                        <label  class="text-sm">Notas de fondo</label>
                                        <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Fondo" style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true" name="fondos[]" id="fondos">
                                          <option data-select2-id="7">Alabama</option>
                                          <option data-select2-id="8">Alaska</option>
                                          <option data-select2-id="9">California</option>
                                          <option data-select2-id="10">Delaware</option>
                                          <option data-select2-id="11">Tennessee</option>
                                          <option data-select2-id="12">Texas</option>
                                          <option data-select2-id="13">Washington</option>
                                        </select>
                                    </div>
                          
                        </div>
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
            </form>
    </div>
    
</div>

@endsection

@section('js')

    <script>

$(document).ready(function() {
    $('#ingredientes').select2();
    $('#salidas').select2();
    $('#corazon').select2();
    $('#fondos').select2();
});


        $('form[id="validate"]').validate({
  rules: {
    nombre: {
        required: true,
        minlength: 2,
    },
    descripcion: {
        required: true,
        minlength: 10,
        maxlength: 200,
    },
    precio: {
            required: true,
            number: true,
    },
    imagen: {
        extension: "jpg|jpeg|png"
    },
    genero: {
        required: true,
    },
    min_edad: {
        required: true,
        range: [1, 49]
    },
    max_edad: {
        required: true,
        range: [50, 99]
    },
    perfumista: {
        required: true,
    },
    volumen3: {
        required: true,
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

    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });

    </script>

    <script>
        $(document).ready(function() {
            $("input[name$='estructura']").click(function() {
                var test = $(this).val();
                $("div.desc").hide();
                $("#fases" + test).show();
            });
        });

    </script>

@stop