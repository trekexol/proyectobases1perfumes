@extends('adminlte::page')

@section('title', 'Contrato')

@section('content_header')
    <h1>Pedidos</h1>
@stop

@section('content')
<section class="content">
   
    
  <div class="row">
    <div class="col-3">
      @include('Empresa.Productor.productor_menu')
    </div>

    <div class="col-9">
      <div class="card">
        <div class="card-header">
            <h2>Listado de Pedidos</h2>
          <div class="row">
              <div class="col-3">

                   {{-- @include('Contrato.search')   --}}
              </div>
           </div> 
        </div>
        <div class="card-body p-0" style="display: block;">
            
            @if ($pedidos)
          <table class="table">
            <thead>
              <tr>
                <th>Numero de Pedido</th>
                <th>Proveedor</th>
                <th>Monto total</th>
                <th style="width: 15%"></th>
              </tr>
            </thead>
            <tbody>
             
            <th>Proveedor</th>
            <th>
                Comprar
            </th>
              
            </tbody>
          </table>
          @else
          <h5 class="d-flex justify-content-center">Aun no tiene Pedidos Realizados</h5>
          @endif
        </div>
        <!-- /.card-body -->
        <div class="card-footer" style="display: block;">
            <div class="d-flex justify-content-sm-end">
                {{$pedidos->render()}}
               </div>
               <div class="row">
                   <div class="col-9 d-flex justify-content-sm-end">
                   <a href="{{ action('DetallePedidoController@index', $productor->id) }}" class="btn btn-info btn-sm">
                        Realizar Nueva Compra
                    </a>
                   </div>
                   
               </div>
        </div>
        <!-- /.card-footer-->
      </div>
    </div>
  </div>

    <!-- /.card -->
  </section>

@stop

@section('js')

    <script>
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
            toastr.success("{{Session::get('success')}}");
        @endif
    </script>
@endsection