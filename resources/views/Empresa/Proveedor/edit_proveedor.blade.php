@extends('adminlte::page')

@section('title', 'Edicion de Proveeodr')

@section('content')
<section class="content">
    <form action="{{action('ProveedorController@update', $proveedor->id)}}" method="post" autocomplete="off" id="empresa">    
        @method('PUT')
        @csrf
        <div class="card">
        
    <div class="card-body">
        
          
        <h2>Datos Generales de la Empresa: </h2>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="Nombre Productor">Nombre</label>
                    <input type="text" class="form-control form-control-sm" name="nombre" placeholder="Nombre Productor" value="{{$proveedor->nombre}}">
                </div>
        
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Nombre Productor">Pagina Web</label>
                            <input type="text" class="form-control form-control-sm" name="url" placeholder="examplesite.com" value="{{$proveedor->pagina_web}}">
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="Nombre Productor">Correo Electorinco</label>
                            <input type="text" class="form-control form-control-sm" name="email" placeholder="exampl@email.com" value="{{$proveedor->correo_electronico}}">
                    </div>
                </div>
                
            </div>

            <div class="col-6">

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Nombre Productor">Direccion</label>
                            <input type="text" class="form-control form-control-sm" name="direccion" placeholder="Direccion" value="{{$proveedor->calle_avenida}}">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label>Pais</label>
                            <select class="js-example-basic-single form-control-sm" name="pais" id="pais" style="width: 100%;" >
                                <option value="{{$pais_proveedor->id}}">{{$pais_proveedor->nombre}}</option>
                                @foreach ($pais as $p)
                                    @if ($p->id != $pais_proveedor->id)
                                    <option value="{{$p->id}}">{{$p->nombre}}</option>
                                    @endif
                              @endforeach
                            </select>
                          </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Codigo Postal">Codigo Postal</label>
                            <input type="text" class="form-control form-control-sm" name="codigo_postal" placeholder="Codigo Postal" value="{{$proveedor->codigo_postal}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Telefono</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                              </div>
                              <input type="text" class="form-control form-control-sm" data-inputmask="&quot;mask&quot;: &quot;+(99) 999-999-9999&quot;" data-mask="" im-insert="true" name="telefono" value="{{$contacto->codigo}}{{$contacto->numero_telefono}}">
                            </div>
                          </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-6">
                <h2>Asociaciones Nacionales</h2>

                <div class="form-group">
                    <label>Asociaciones Nacionales</label>
                    <select class="js-example-basic-single form-control-sm" name="asociacion" id="asociacion" style="width: 100%;" tabindex="-1" aria-hidden="true">
                      <option value="0">Ninguno</option>
                      <option selected value="{{$asociacion_proveedor->id}}">{{$asociacion_proveedor->nombre}}</option>
                      @foreach ($asociaciones as $a)
                        @if ($a->id != $asociacion_proveedor->id)
                        <option value="{{$a->id}}">{{$a->nombre}} - {{$a->iniciales}}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>

            </div>

            <div class="col-6">
                <h2>Miembro Ifra</h2>

                @if ($miembro->tipo == 'Principal')
                <div class="row">
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="principal" checked="" value="Principal">
                            <label class="form-check-label">Principal</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="principal" value="Secundario">
                            <label class="form-check-label">Secundario</label>
                        </div>
                    </div>
                </div>
                @else

                <div class="row">
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="principal value="Principal">
                            <label class="form-check-label">Principal</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="principal"  checked="" value="Secundario">
                            <label class="form-check-label">Secundario</label>
                        </div>
                    </div>
                </div>
                @endif
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
        $('#pais').select2();
        $('#asociacion').select2();
    });
    
    $('form[id="empresa"]').validate({
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

