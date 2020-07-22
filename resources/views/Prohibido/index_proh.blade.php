@extends('adminlte::page')

@section('title', 'Prohibido')

@section('content_header')
    <h1>Prohibido</h1>
@stop

@section('content')
<section class="content">
   
    
  <div class="row">

    <div class="col-9">
      <div class="card">
        <div class="card-header">
          <div class="row">
              <div class="col-9">
                @include('Prohibido.newBtn')
              </div>
           </div> 
        </div>
        <div class="card-body p-0" style="display: block;">
          @if ($proh)
          <table class="table">
            <thead>
              <tr>
                
                <th>TSCA CAS</th>
                <th>Nombre</th>
                
                <th style="width: 25%">Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($proh as $p)
              <tr>
                
                <td>{{$p->tsca_cas}}</td>
                <td>{{$p->nombre}}</td>

                <td class="d-flex justify-content-between">
                    
                    <a class="btn btn-info btn-sm" href="{{action('ProhibidoController@edit', $p->tsca_cas)}}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Editar
                    </a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{$p->tsca_cas}}">
                            <i class="fas fa-trash">
                            </i>
                            Eliminar
                        </button>
                    {{-- <a class="btn btn-danger btn-sm"  data-target="#modal-delete-{{$p->tsca_cas}}" >
                        <i class="fas fa-trash">
                        </i>
                        Eliminar
                    </a> --}}
                   
                </td>
              </tr>
              @include('Prohibido.delete')

              @endforeach 
              
            </tbody>
          </table>
          @endif
        </div>
        <!-- /.card-body -->
        <div class="card-footer" style="display: block;">
         <div class="d-flex justify-content-sm-end">
        
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

