@extends('adminlte::page')

@section('title', 'Ingredientes')

@section('content_header')
    <h1>Ingredientes</h1>
@stop

@section('content')
<section class="content">
   
    
  <div class="row">
    <div class="col-3">
      @include('Ingredientes.ingredientes_menu')
    </div>

    <div class="col-9">
      <div class="card">
        <div class="card-header">
          <div class="row">
              <div class="col-9">
                @include('Ingredientes.Otros_Ingredientes.newBtn')
              </div>
           </div> 
        </div>
        <div class="card-body p-0" style="display: block;">
          @if ($ingr)
          <table class="table">
            <thead>
              <tr>
                
                <th>ID</th>
                <th>Proveedor</th>
                <th>Nombre</th>
                <th>Fórmula Química</th>
                <th>IPC</th>
                <th>TSCA CAS</th>
                
                <th style="width: 25%">Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($ingr as $i)
              <tr>
                
                <td>{{$i->id}}</td>
                <td>{{$i->id_proveedor}}</td>
                <td>{{$i->nombre}}</td>
                <td>{{$i->formula_quimica}}</td>
                <td>{{$i->ipc}}</td>
                <td>{{$i->tsca_cas}}</td>

                <td class="d-flex justify-content-between">
                    
                    <a class="btn btn-info btn-sm" href="{{action('O_IngredientesController@edit', $i->id)}}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Editar
                    </a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{$i->id}}">
                            <i class="fas fa-trash">
                            </i>
                            Eliminar
                        </button>
                    {{-- <a class="btn btn-danger btn-sm"  data-target="#modal-delete-{{$i->id}}" >
                        <i class="fas fa-trash">
                        </i>
                        Eliminar
                    </a> --}}
                   
                </td>
              </tr>
              @include('Ingredientes.Otros_Ingredientes.delete')

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

