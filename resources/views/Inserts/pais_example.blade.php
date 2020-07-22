@extends('adminlte::page')

@section('title', 'Condicion de Contrato')

@section('content_header')
    <h1>Condicion de Contrato</h1>
@stop

@section('content')
<section class="content">
   
    <div class="card">
      <div class="card-header">
        <div class="row">
            <div class="col-9">
             {{-- @include('Condicion_Contrato.newBtn') --}}
            </div>
            <div class="col-3">
                <form action="{{ action('PaisController@index') }}" method="GET">
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
        @if ($pais)
        <table class="table">
            <thead>
              <tr>
                
                <th>id pais</th>
                <th>nombre</th>
                
                <th style="width: 25%">Opciones</th>
              </tr>
            </thead>
            <tbody>
           
            @foreach ($pais as $p)
            <tr>
              
              <td>{{$p->id}}</td>
              <td>{{$p->nombre}}</td>
              <td class="d-flex justify-content-between">
                  
                  {{-- <a class="btn btn-info btn-sm" href="{{action('PaisController@edit', $p->id)}}">
                      <i class="fas fa-pencil-alt">
                      </i>
                      Editar
                  </a>
                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{$p->id}}">
                          <i class="fas fa-trash">
                          </i>
                          Eliminar
                      </button> --}}
                  {{-- <a class="btn btn-danger btn-sm"  data-target="#modal-delete-{{$condicion->id_condicion}}" >
                      <i class="fas fa-trash">
                      </i>
                      Eliminar
                  </a> --}}
                 
              </td>
            </tr>
            {{-- @include('Condicion_Contrato.delete') --}}

            @endforeach 
            @endif
              
            </tbody>
          </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer" style="display: block;">
       <div class="d-flex justify-content-sm-end">
        @if ($pais)
        {{$pais->render()}}
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
@endsection