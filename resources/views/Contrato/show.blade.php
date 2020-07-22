@extends('adminlte::page')

@section('title', 'Contrato')

@section('content_header')
    <div class="row">
        <div class="col-6">
            <h1>Empresa - {{$productor->nombre}}</h1>
        </div>
        
    </div>
    
@stop

@section('content')

                  <div class="row">

                    <div class="col-3">
                      @include('Empresa.Productor.productor_menu')
                    </div>

                    <div class="col-9">
                         <!-- Default box -->
                    <div class="card card-solid">
                      <div class="card-body">
                        <h3>{{$productor->nombre}}</h3>
                        <div class="row">
                            <div class="col-3">
                                <h4>Contrato no {{$productor->id}}{{$contrato->id_contrato}}{{$proveedor->id}}</h5>
                            </div>
                            <div class="col-3">
                                
                            </div>
                            <div class="col-3">
                                <h5>Fecha Inicial: {{$contrato->fecha_inicial}}</h5>
                            </div>
                            <div class="col-3">
                                <h5>Fecha Final: {{date('Y-m-d', strtotime($contrato->fecha_inicial. "+1 year"))}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h4>Estipulacion</h4>
                                <h5>
                                    Nosotros empresa productora <b>{{$productor->nombre}}</b> estipulamos la creacion de un contrato no <b>{{$productor->id}}{{$contrato->id_contrato}}{{$proveedor->id}}</b> para la asignacion de ciertos metodos de pagos y metodos de envio, junto productos que se estipularan a continuacion los proveedores <b>{{$proveedor->nombre}}</b>
                                    @if ($contrato->descuento)
                                        con un descuento de <b>{{$contrato->descuento}}%</b> 
                                    @endif
                                    @if ($contrato->exclusividad)
                                        con <b>exclusividad preferencial</b> para los productos en la siguiente lista
                                    @endif
                                    . Dado por:
                                </h5>
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-12">
                            <h4>Metodo de Pago</h4>
                           

                            @if ($metodo_pago)
                            <table class="table table-sm">
                              <tbody>
                                  {{-- @foreach ($metodo_pago as $mp) --}}
                                      <td>{{$metodo_pago->nombre}}</td>
                                      <td>{{$metodo_pago->tipo}}</td>
                                      <td>{{$metodo_pago->descripcion}}</td>
                                      <td>{{$metodo_pago->plazo_dias}} dias</td>
                                      <td>{{$metodo_pago->cuotas}} cuotas </td>
                                      <td>{{$metodo_pago->porcentaje_cuotas}}%</td>
                                  {{-- @endforeach --}}
                              </tbody>
                            </table>
                            @else
                                No hay metodo de pago
                            @endif
                           </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                             <h4>Metodo de Envio</h4>

                             <table class="table table-sm">
                                @if ($metodo_envio)
                                <tbody>
                                  {{-- @foreach ($metodo_envio as $me) --}}
                                  <td>{{$metodo_envio->transporte}}</td>
                                  <td>
                                    @if ($metodo_envio->extras)
                                    {{$metodo_envio->extras}}
                                    @else 
                                    No hay extra disponible
                                  @endif
                                </td>
                                  <td>Precio: {{$metodo_envio->coste}}$</td>
                                  <td>Salida desde: {{$metodo_envio->nombre_pais}}</td>
                                  {{-- @endforeach --}}
                                  
                              </tbody>
                              @else 
                              No hay metodo de envio
                                @endif
                              </table>

                            </div>
                         </div>
                         <div class="row">
                            <div class="col-12">
                             <h4>Productos</h4>
                             
                             <table class="table table-sm">
                                <tbody>
                                   
                                </tbody>
                              </table>
                            </div>
                         </div>


                      <!-- /.card-body -->
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button action="" type="submit" class="btn btn-primary">PDF</button>
                            <a href="/productores/{{$productor->id}}" type="button" class="btn btn-danger">Continuar</a>
                        </div>
                    </div>
                    <!-- /.card -->
                    </div>

                  </div>
              
                {{-- </section> --}}


      
@endsection


