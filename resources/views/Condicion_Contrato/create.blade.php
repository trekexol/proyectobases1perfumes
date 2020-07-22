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
            <form id="contrato" action="{{ action('CondicionController@store', ['productor' => $productor->id, 'proveedor'=> $proveedor->id, 'contrato'=>$contrato->id_contrato]) }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h2>Paso 1: Asignar Condiciones de Pagos y Envios</h2>
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
                        <div class="form-group mb-0">
                            <div class="custom-control custom-radio">
                              
                              <h3>Metodos de Pago</h3>
                              <span class="text-danger">{{ $errors->first('metodo_pago') }}</span>
                            </div>
                          </div>
                            <label for="metodo_pago"></label>
            
                            <table class="table table-lg">
                                
                                <tbody>
                                    @for ($i = 0; $i < count($metodo_pago); $i++)
                                    <tr>
                                    <td style="width: 5%">
                                        
                                        <div class="col-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" name="metodo_pago[]" id="customCheckboxpago{{$i}}" value="{{$metodo_pago[$i]->id}}">
                                                    <label for="customCheckboxpago{{$i}}" class="custom-control-label"></label>
                                                </div>
                                            </div>

                                
                                    </td>
                                    <td>{{$metodo_pago[$i]->nombre}}</td>
                                    <td>
                                        {{$metodo_pago[$i]->tipo}}
                                    </td>
                                    <td>
                                        {{$metodo_pago[$i]->plazo_dias}} dias
                                    </td>

                                    <td>
                                        {{$metodo_pago[$i]->descripcion}}
                                    </td>

                                    <td>
                                        Cuotas {{$metodo_pago[$i]->cuotas}}
                                    </td>
                                    <td>
                                        Porcentaje Cuotas {{$metodo_pago[$i]->porcentaje_cuotas}}%
                                    </td>
                                    </tr>
                
                                    @endfor
                                </tbody>
                                </table>
                            <br>
                                <div class="row">

                                    <div class="col-sm-4">
                                    
                                          <!--  <div class="form-group">
                                                <label class="text-sm">Evaluar Forma de Pago: </label>
                                                <input type="number" class="form-control form-control-sm" name="eval_pago" id="eval_pago" placeholder="Evaluacion">
                                            
                                            </div> -->
                                    </div>
                                    <div class="col-sm-4">
                                    </div>

                                    <div class="col-sm-4">
                                        <label for=""><h2>Descuento Especial</h2></label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Ingrese su descuento" name="descuento">
                                    </div>
                                </div>

                                <br>
                                
                                <div class="form-group mb-0">
                                    <div class="custom-control custom-radio">
                              
                                        <h3>Metodos de Envio</h3>
                                        <span class="text-danger">{{ $errors->first('metodo_envio') }}</span>
                                      </div>
                                  </div>
                            
                                
            
                            <table class="table table-lg">
                                
                                <tbody>
                                    @for ($i = 0; $i < count($metodo_envio); $i++)
                                    <tr>
                                    <td style="width: 5%">
                                    
                                            <div class="col-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" name="metodo_envio[]" id="customCheckbox{{$i}}" value="{{$metodo_envio[$i]->id}}">
                                                    <label for="customCheckbox{{$i}}" class="custom-control-label"></label>
                                                </div>
                                            </div>

                                            
                                    </td>
                                    <td>{{$metodo_envio[$i]->transporte}}</td>
                                    <td>
                                        {{$metodo_envio[$i]->coste}}$
                                    </td>
                                    <td>
                                        @if ($metodo_envio[$i]->extras)
                                        {{$metodo_envio[$i]->extras}}
                                        @else
                                            No disponible
                                        @endif
                                    </td>
                                    
                                    </tr>
                
                                    @endfor
                                </tbody>
                                </table>
                                <br>
                                <div class="col-6">
                               <!-- <div class="form-group">
                                    <label class="text-sm">Evaluar Forma de Envio: </label>
                                    <input type="number" class="form-control form-control-sm" name="eval_envio" id="eval_envio" placeholder="Evaluacion" required>
                                   
                                </div> -->
                                </div>
{{-- 
                                <div class="form-group mb-0">
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                                    </div>
                                  </div>
             --}}
                        
                    
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Siguiente
                        </button>
                        
                          <a href=" {{ url('productores/'.$productor->id.'') }}"  class="btn btn-danger"> No realizar contrato</a>
                    </div>
                </div>
                
                       
            </div>
            </form>
    </div>
    @include('Contrato.delete_contrato')
@endsection

@section('js')
    <script>

        $('form[id="contrato"]').validate({
            rules: {
                descuento: {
                    required: false,
                    number: true,
                    minLength: 0,
                    maxLength: 100,
                },
               
            },
            messages: {
                descuento: 'Por favor seleccione un valor entre 1 a 100'
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
@stop