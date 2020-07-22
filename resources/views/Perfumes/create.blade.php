@extends('adminlte::page')

@section('title', 'Crear Perfumes')

@section('content_header')
    <h1>Crear Perfumes</h1>
@stop

@section('content')
<div class="card">
    <form action="{{action('PerfumesController@store')}}" method="post" autocomplete="off" id="validate" enctype="multipart/form-data">
        @csrf
    <div class="card-header">
        <h2>Detalles Generales</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                
                {{-- <div class="validate"> --}}
                <div class="form-group">
                    <label for="Nombre Productor">Nombre</label>
                    <input type="text" class="form-control form-control-sm" name="nombre" placeholder="Nombre">
                </div>
               
                <div class="form-group">
                    <label for="genero" >Genero:</label>
                    <select name="genero" id="genero" class="form-control">
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                    <option value="U">Unisex</option>
                    </select>
                </div>
        
                <div class="form-group">
                    <label class="text-sm">Recomendacion: </label>
                    <input type="text" class="form-control form-control-sm" name="recomendacion" id="recomendacion" placeholder="recomendacion">
                </div>
                   
                <div class="form-group">
                            <label>Productor</label>
                            <select class="custom-select" name="productor" id="productor" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            
                            @foreach ($productor as $a)
                            <option value="{{$a->id}}">{{$a->nombre}}</option>
                            @endforeach
                            </select>
                        </div>
                    
                {{-- </div>     --}}
    
               
            </div>


            <div class="col-4">
            
          <h2 align="center">Intensidad Aromatica</h2>
                
                <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-sm">Tipo de Perfume</label>
                                <select class="custom-select" name="tipo_intensidad" id="tipo_intensidad" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option value="P">Perfume (P)</option>
                                <option value="EdP">Eau de Perfume (EdP)</option>
                                <option value="EdT">Eau de Toilette (EdT)</option>
                                <option value="EdC">Eau de Cologne (EdC)</option> 
                                <option value="EdS">Splash perfumes (EdS)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                        <div class="form-group">
                            <label for="Iniciales Productor">Iniciales</label>
                            <input type="text" class="form-control form-control-sm" name="iniciales_intensidad" placeholder="iniciales">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Concentracion Productor">Concentracion</label>
                            <input type="text" class="form-control form-control-sm" name="concentracion_intensidad" placeholder="concentracion">
                        </div>
                    </div>  
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Descripcion Productor">Descripcion</label>
                            <input type="text" class="form-control form-control-sm" name="descripcion_intensidad" placeholder="descripcion">
                        </div>
                    </div>     

                 
                </div>

                <div class="form-group">
                    <div class="row">
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
                            <label>Perfumista</label>
                            <select class="js-example-basic-multiple form-control-sm" name="perfumista[]" id="perfumista" style="width: 100%;" multiple="multiple">
                              @foreach ($perfumista as $p)
                                <option value="{{$p->id}}">{{$p->nombre_primero  }} - {{$p->apellido_primero}}</option>
                              @endforeach
                            </select>
                          </div>
                    </div>

                   
                        <div class="form-group">
                            <label>Otros Ingredientes</label>
                            <select class="js-example-basic-multiple form-control-sm" name="ingrediente[]" id="ingrediente" style="width: 100%;" multiple="multiple">
                              @foreach ($ingrediente as $p)
                                <option value="{{$p->id}}">{{$p->nombre  }} - {{$p->ipc}}</option>
                              @endforeach
                            </select>
                          </div>
                   
                        
                    </div>
                </div>

                  
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label class="text-sm">Estructura de la Perfumes: </label>
                    <div class="row">

                        <div class="col-6">

                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio1" name="estructura"   value="2">
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
                    <br>
                    
                        <div class="form-group">
                            <label>Esencia del Perfume</label>
                            <select class="js-example-basic-multiple form-control-sm" name="esencia[]" id="esencia" style="width: 100%;" multiple="multiple">
                                  @foreach ($esencia as $p)
                                  <option  value="{{$p->tsca_cas}}" >{{$p->tsca_cas}} - {{$p->nombre}}</option>
                                  
                                  @endforeach
                            </select>
                          </div>
                    
                       
                    </div>
                    <div id="fases1" class="desc" style="display: none;">
                    <br>
                        <div class="row">
                            <div class="form-group" data-select2-id="1">
                                <label  class="text-sm">Notas de salida: </label>
                                <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Salida" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="salidas[]" id="salidas">
                                @foreach ($esencia as $p)
                                  <option  value="{{$p->tsca_cas}}" >{{$p->tsca_cas}} - {{$p->nombre}}</option>
                                  
                                  @endforeach
                                </select>
                            </div>

                                <div class="form-group" data-select2-id="2">
                                    <label  class="text-sm">Notas de Corazon</label>
                                    <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Corazon" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true" name="corazon[]" id="corazon">
                                    @foreach ($esencia as $p)
                                  <option  value="{{$p->tsca_cas}}" >{{$p->tsca_cas}} - {{$p->nombre}}</option>
                                  
                                  @endforeach
                                    </select>
                                </div>

                                    <div class="form-group" data-select2-id="3">
                                        <label  class="text-sm">Notas de fondo</label>
                                        <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Fondo" style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true" name="fondos[]" id="fondos">
                                        @foreach ($esencia as $p)
                                         <option  value="{{$p->tsca_cas}}" >{{$p->tsca_cas}} - {{$p->nombre}}</option>
                                  
                                         @endforeach
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
                        <a href=" {{ url('perfume') }}"  class="btn btn-danger">Cancelar</a>
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
    
    $('#familia').select2();
        $('#perfumista').select2();
        $('#esencia').select2();
        $('#ingrediente').select2();
    
    bsCustomFileInput.init();

   // $('#tipo').select2();
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