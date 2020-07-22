@extends('adminlte::page')

@section('title', 'Contrato')

@section('content_header')
    <h1>Contrato</h1>
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
          <div class="row">
              <div class="col-9">
               {{-- @include('Contrato.newBtn') --}}
              </div>
              <div class="col-3">
                   @include('Contrato.search')  
              </div>
           </div> 
        </div>
        <div class="card-body p-0" style="display: block;">
          @if ($contratos)
          <table class="table">
            <thead>
              <tr>
                
                <th>Numero Contrato</th>
                <th>Proveedor</th>
                <th>Fecha Emisión</th>
                <th>Fecha Finalizada</th>
                
                <th style="width: 25%">Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($contratos as $contrato)
              <tr>
                
                <td>{{$productor->id}}{{$contrato->id_contrato}}{{$contrato->id_proveedor}}</td>
                <td>{{$contrato->proveedor_nombre}}</td>
                <td>{{$contrato->fecha_inicial}}</td>
                <td>{{$contrato->fecha_final}}</td>
                <td class="d-flex justify-content-between">
                    
                    <a class="btn btn-info btn-sm" href="{{action('ContratoController@show', ['productor' => $productor->id, 'contrato' => $contrato->id_contrato, 'proveedor'=> $contrato->id_proveedor])}}">
                        <i class="fas fa-info">
                        </i>
                        Ver Contrato
                    </a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-cancelar-{{$contrato->id_contrato}}">
                            <i class="fas fa-times">
                            </i>
                            Cancelar
                        </button>
                   
                </td>
              </tr>
              {{-- @include('Contrato.delete') --}}

              @endforeach 
              
            </tbody>
          </table>
          @endif
        </div>
        <!-- /.card-body -->
        <div class="card-footer" style="display: block;">
         <div class="d-flex justify-content-sm-end">
          {{$contratos->render()}}
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