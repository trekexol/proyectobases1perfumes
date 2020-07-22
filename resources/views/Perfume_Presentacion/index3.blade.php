@extends('adminlte::page')

@section('title', 'Presentacion del Perfume ')

@section('content_header')
    <h1>Presentacion del Perfume {{$perfume->nombre}} </h1>
@stop

@section('content')
<section class="content">
   
    <div class="card">
      <div class="card-header">
        <div class="row">
            <div class="col-9">

            </div>
            <div class="col-3">
                <form action="{{ action('Perfume_PresentacionController@index') }}" method="GET">
                    @method('GET')
                @csrf
                <div class="input-group input-group-sm ">
                    <input type="text" placeholder="Buscar" name="buscar" class="form-control">
                    <span class="input-group-append">
                      <button class="btn btn-info btn-flat" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                    </span>
                  </div>
                </form>
            </div>
         </div>
      </div>
      <div class="card-body p-0" style="display: block;">
        @if ($vars)
        <table class="table">
            <thead>
            <tr>
                <th>Tipo Intensidad</th>
                <th>Iniciales</th>
                <th>Cantidad</th>
                <th>Volumen ml</th>
                
                <th style="width: 25%">Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($vars as $var)
              <tr>
              <th>{{$intensidad->tipo}}</th>
              <th>{{$intensidad->iniciales}}</th>
              <th>{{$var->cantidad}}</th>
              <th>{{$var->volumen}}</th>
              <td class="d-flex justify-content-between">
                    
                    <a class="btn btn-info btn-sm" href="{{action('Perfume_PresentacionController@edit', [$perfume->id,$intensidad->id])}}">
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
            
              @endforeach
            @endif
              
            </tbody>
          </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer" style="display: block;">
       <div class="d-flex justify-content-sm-end">
        @if ($vars)
        {{$vars->render()}}
        @endif
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
    <script>
@if(Session::has('message')) 
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
            toastr.error("{{Session::get('message')}}");
        @endif
    </script>
@endsection