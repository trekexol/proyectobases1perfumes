@extends('adminlte::page')

@section('title', 'Example')

@section('content_header')
    <h1>BUSQUEDA</h1>
@stop

@section('content')
<section class="content">
   
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <div class="row">
            <div class="col-9">
             @include('ExampleCRUD.newBtn')
            </div>
            <div class="col-3">
                 @include('ExampleCRUD.search')  
            </div>
         </div>
      </div>
      <div class="card-body p-0" style="display: block;">
        <table class="table">
            <thead>
              <tr>
                <th style="width: 10px">id</th>
                <th>Nombre y Apellido</th>
                <th>Fecha Nacimiento</th>
                <th style="width: 25%">Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($examples as $example)
              <tr>
                <td>{{$example->pk}}</td>
                <td>{{$example->name}} {{$example->lastname}}</td>
                <td>{{$example->fecha_nacimiento}}</td>
                <td class="d-flex justify-content-between">
                    <a class="btn btn-primary btn-sm" href="#">
                        <i class="fas fa-folder">
                        </i>
                        Ver
                    </a>
                    <a class="btn btn-info btn-sm" href="{{action('ExampleController@edit', $example->pk)}}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Editar
                    </a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{$example->pk}}">
                            <i class="fas fa-trash">
                            </i>
                            Eliminar
                        </button>
                    {{-- <a class="btn btn-danger btn-sm"  data-target="#modal-delete-{{$example->pk}}" >
                        <i class="fas fa-trash">
                        </i>
                        Eliminar
                    </a> --}}
                   
                </td>
              </tr>
              @include('ExampleCRUD.delete')

              @endforeach
              
            </tbody>
          </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer" style="display: block;">
       <div class="d-flex justify-content-sm-end">
        {{$examples->render()}}
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