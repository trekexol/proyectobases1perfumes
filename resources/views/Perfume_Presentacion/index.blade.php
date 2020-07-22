@extends('adminlte::page')

@section('title', 'Presentacion Perfume')

@section('content_header')
    <h1>Presentacion Perfume</h1>
@stop

@section('content')
<section class="content">
   
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <div class="row">
            <div class="col-9">
             @include('Perfume_Presentacion.newBtn')
            </div>
            <div class="col-3">
                 @include('Perfume_Presentacion.search')  
            </div>
         </div>
      </div>
      <div class="card-body p-0" style="display: block;">
        <table class="table">
            <thead>
              <tr>
                <th>Cantidad</th>
                <th>Volumen ml</th>
                
                <th style="width: 25%">Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($vars as $var)
              <tr>
                <td>{{$var->cantidad}} </td>
                <td>{{$var->volumen_ml}}</td>
               
                <td class="d-flex justify-content-between">
                    
                    <a class="btn btn-info btn-sm" href="{{action('PrespController@edit', $var->id)}}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Editar
                    </a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{$var->id_var}}">
                            <i class="fas fa-trash">
                            </i>
                            Eliminar
                        </button>
                    {{-- <a class="btn btn-danger btn-sm"  data-target="#modal-delete-{{$var->id}}" >
                        <i class="fas fa-trash">
                        </i>
                        Eliminar
                    </a> --}}
                   
                </td>
              </tr>
              @include('Perfume_Presentacion.delete')

              @endforeach
              
            </tbody>
          </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer" style="display: block;">
       <div class="d-flex justify-content-sm-end">
        {{$vars->render()}}
       </div>
      </div>
      <!-- /.card-footer-->
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