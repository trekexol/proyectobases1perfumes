@extends('adminlte::page')

@section('title', 'Proveedores Activos')

@section('content_header')
    <h1>Proveedores con Contratos Activos</h1>
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
           
          <table class="table">
            <thead>
              <tr>
                <th>Numero de Contrato</th>
                <th>Proveedor</th>
                <th style="width: 20%">Comprar</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($proveedores as $p)
           <tr>
            <td>{{$p->id_productor}}{{$p->id_contrato}}{{$p->id_proveedor}}</td>
            <td>{{$p->nombre}}</td>
            <td>

               {{-- <a href="/productores/{{$p->id_productor}}/{{$p->id_contrato}}/{{$p->id_proveedor}}/" class="btn btn-success btn-sm">
                <i class="fa fa-shopping-bag"></i>
                Realizar Compra

                </a> --}}

                <form action="{{ action('PedidoController@store', ['productor'=>$p->id_productor, 'contrato'=> $p->id_contrato, 'proveedor'=> $p->id_proveedor]) }}" method="post">
                 @csrf
                    <button type="submit" class="btn btn-success btn-sm">
                    <i class="fa fa-shopping-bag"></i>
                    Realizar Compra
    
                    </button>
                </form>
                    {{-- <button type="submit" class="btn btn-success btn-sm">
                       
                    </button> --}}
           
                
            </td>
           </tr>
            @endforeach
              
            </tbody>
          </table>
         
        </div>
        <!-- /.card-body -->
        <div class="card-footer" style="display: block;">
            <div class="d-flex justify-content-sm-end">
                {{-- {{$pedidos->render()}} --}}
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