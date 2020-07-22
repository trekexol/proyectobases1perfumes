@extends('adminlte::page')

@section('title', 'Crear Contrato')

@section('content_header')
    <h1>Crear Contrato</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-3">
            @include('Empresa.Productor.productor_menu')
        </div>
 
        <div class="col-9">
            <form action="{{ action('C_IngredienteController@store', ['productor'=>$productor->id, 'proveedor'=>$proveedor->id, 'contrato'=>$contrato->id_contrato]) }}" method="post" id="contrato" >
              @csrf
              <div class="card">
                <div class="card-header">
                    <h2>Paso 2: Asignar Productos al Contrato</h2>
                    
                    <div class="row">
                        <div class="col-4">
                            <h4>Contrato No: {{$productor->id}}{{$contrato->id_contrato}}{{$proveedor->id}}   </h4>
                        </div>

                        <div class="col-4">
                            <h4>Fecha Inicial: {{$contrato->fecha_inicial}}</h4>
                        </div>
                        <div class="col-4">
                            <h4>Fecha Fecha Final: {{date('Y-m-d', strtotime($contrato->fecha_inicial. "+1 year"))}}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                            <form action="" method="post" autocomplete="off" id="contrato" enctype="multipart/form-data">
                            @csrf
                        <div class="example_form"> 
                            <h3>Ingredientes Disponibles</h3>
                            <span class="text-danger">{{ $errors->first('producto') }}</span>
                            <table class="table table-lg">
                                
                                <tbody>

                                  @if ($materias->first())
                                      @foreach ($materias as $m)
                                      <tr>
                                        <td style="width: 5%">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{$m->pc}}" name="producto[]">
                                          </div>
                                        </td>
                                        <td>{{$m->nombre}} ({{$m->volumen_ml}}) </td>
                                      </tr>
                                      @endforeach
                                  @endif

                                  @if ($otros_ingredientes->first())
                                  @foreach ($otros_ingredientes as $o)
                                  <tr>
                                    <td style="width: 5%">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$o->pc}}" name="producto[]">
                                      </div>
                                    </td>
                                    <td>{{$o->nombre}} ({{$o->volumen_ml}} ml) </td>
                                  </tr>
                                  @endforeach
                              @endif
                           
                                </tbody>
                              </table>
                              
                              <div class="form-check align-content-center">
                                <input class="form-check-input" type="checkbox" name="exclusivo" value="exclusivo">
                                <label for="Exclusivo">Asignar Contrato como "Exclusivo"</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="aceptar" value="aceptar">
                                <label for="Terminos y Condiciones">Aceptar los Terminos y Condiciones del Contrato</label>
                                <span class="text-danger">{{ $errors->first('aceptar') }}</span>
                              </div>
                        </div>      
            
                     
               
                
            </div>
            <div class="card-footer">
                <div class="form-group">
                    <button action="" type="submit" class="btn btn-primary">Siguiente</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$contrato->id_contrato}}">
                      No realizar contrato
                    </button>
                 
                </div>
            </div>
            
          </form>
        </div>
            </form>
    </div>

    @include('Contrato.delete_contrato')
@endsection

@section('js')

    <script>

        $('form[id="contrato"]').validate({
          rules: {
            producto: {
                required: true,
                minlength: 1;
            },
            aceptar: 'required',
          },
          messages: {
            producto: 'Este campo es requerido',
            aceptar: 'Este campo es requerido',
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

    </script>
@stop