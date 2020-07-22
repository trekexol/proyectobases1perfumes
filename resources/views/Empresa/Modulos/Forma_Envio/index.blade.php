@extends('adminlte::page')

@section('title', 'Forma Envio')

@section('content_header')
    <h1>Forma Envio</h1>
@stop

@section('content')
<section class="content">
   
  <div class="row">
    <div class="col-3">
      @include('Empresa.Proveedor.proveedor_menu')
    </div>
    <div class="col-9">
      <div class="card">
        <div class="card-header">
          <div class="row">
              <div class="col-9">
               @include('Empresa.Modulos.Forma_Envio.newBtn')
              </div>
              <div class="col-3">
                   {{-- @include('Empresa.Mudulos.Forma_Envio.search')   --}}
              </div>
           </div>
        </div>
        <div class="card-body p-0" style="display: block;">
          <table class="table">
              <thead>
                <tr>
  
               
                  <th>Transporte</th>
                  <th>Coste</th>
                  <th>Extras</th>
                  
                  <th style="width: 25%">Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($envios as $envio)
                <tr>
  
                
                  <td>{{$envio->transporte}} </td>
                  <td>{{$envio->coste}}</td>
                  <td>{{$envio->extras}}</td>
                  <td class="d-flex justify-content-between">
                      
                      {{-- <a class="btn btn-info btn-sm" href="{{action('Forma_EnvioController@edit', $envio->id, $proveedor->id)}}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Editar
                      </a> --}}
                          {{-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{$envio->id}}">
                              <i class="fas fa-trash">
                              </i>
                              Eliminar
                          </button> --}}
                      {{-- <a class="btn btn-danger btn-sm"  data-target="#modal-delete-{{$envio->id}}" >
                          <i class="fas fa-trash">
                          </i>
                          Eliminar
                      </a> --}}
                     
                  </td>
             
                </tr>
                {{-- @include('Forma_Envio.delete') --}}
  
                @endforeach
                
              </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer" style="display: block;">
         <div class="d-flex justify-content-sm-end">
          {{$envios->render()}}
         </div>
        </div>
        <!-- /.card-footer-->
      </div>
    </div>
  </div>

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