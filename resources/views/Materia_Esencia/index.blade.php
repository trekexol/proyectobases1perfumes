@extends('adminlte::page')

@section('title', 'Materia Esencia')

@section('content_header')
    <h1>Materia Esencia</h1>
@stop

@section('content')
<section class="content">
   
    <div class="card">
      <div class="card-header">
        <div class="row">
            <div class="col-9">
              @include('Materia_Esencia.newBtn') 
            </div>
            <div class="col-3">
                <form action="{{ action('Materia_EsenciaController@index') }}" method="GET">
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
                
              <th>Nombre</th>
                <th>Estado</th>
                <th>Parte</th>
                <th>Naturaleza</th>
                <th>Punto Ebullicion</th>
                <th>IPC</th>
                <th>IPC Alterno</th>
                <th>TSCA CAS</th>
                <th>Descripcion Visual</th>
                <th>Tipo</th>
                <th>Solubilidad</th>
                <th>Proceso</th>
                <th>Descripcion Proceso</th>
                <th style="width: 15%">Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($vars as $var)
              <tr>
                <td>{{$var->nombre}} </td>
                <td>{{$var->estado}}</td>
                <td>{{$var->parte}}</td>
                <td>{{$var->naturaleza}} </td>
                <td>{{$var->punto_ebullicion}}</td>
                <td>{{$var->ipc}}</td>
                <td>{{$var->ipc_alter}}</td>
                <td>{{$var->tsca_cas}}</td>
                <td>{{$var->descripcion_visual}} </td>
                <td>{{$var->tipo}}</td>
                <td>{{$var->solubilidad}}</td>
                <td>{{$var->proceso}} </td>
                <td>{{$var->descproceso}}</td>
                <td class="d-flex justify-content-between">
                    
                    <a class="btn btn-info btn-sm" href="{{action('Materia_EsenciaController@edit', $var->id)}}">
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
              @include('Materia_Esencia.delete')

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