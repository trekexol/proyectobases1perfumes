@extends('adminlte::page')

@section('title', 'Productor')

@section('content_header')
    <div class="row">
        <div class="col-6">
            <h1>Empresa -
                 {{$productor->nombre}}
                </h1>
        </div>
        <div class="col-3">
            <div class="input-group input-group-sm justify-content-end">
                <div class="btn-group">
                    <a class="btn btn-info btn-sm" href="{{ url('/productores/'.$productor->id.'/formulas/create') }}">
                        <i class="fas fa-plus">
                            <span>Nueva Formula Inicial</span>
                        </i>
                    </a>
                  </div>
            </div>
           
        </div>
        <div class="col-3">
            <div class="input-group input-group-sm justify-content-end">
                <div class="btn-group">
                    <a class="btn btn-info btn-sm" href="{{ url('/productores/'.$productor->id.'/formulasA/create') }}">
                        <i class="fas fa-plus">
                            <span>Nueva Formula Anual</span>
                        </i>
                    </a>
                  </div>
            </div>
           
        </div>
    </div>
    @include('Producto.Fragancia.delete')
    
@stop

@section('content')
    {{-- {{action('ExampleController@store')}} --}}
                <form action="" method="post" autocomplete="off" id="example" enctype="multipart/form-data">
                @csrf
                {{-- <section class="content"> --}}

                  <div class="row">

                    <div class="col-3">
                      @include('Empresa.Productor.productor_menu')
                    </div>
                    {{-- {{$formula->fecha_inicial}} --}}
                    <div class="col-9">
                         <!-- Default box -->
                    <div class="card card-solid">
                      <div class="card-body">
                          
                        @include('Empresa.Modulos.Formula.Inicial.filtro')
                            <div class="card-body p-0" style="display: block;">
                            
                                
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th>Tipo Formula</th>
                                        <th>Fecha Inicial</th>
                                        <th>Fecha Final</th>
                                        <th style="width: 25%">Opciones</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                   
                                        @if ($anual || $inicial)
                                    <tr>
                                      
                                      <td>{{$inicial->tipo_formula}}</td>
                                      <td>{{$inicial->fecha_inicial}}</td>
                                      <td>{{$inicial->fecha_final}}</td>
                                      
                               
                    
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
                                              </button>
                                        <a class="btn btn-danger btn-sm"  data-target="#modal-delete-{{$condicion->id_condicion}}" >
                                              <i class="fas fa-trash">
                                              </i>
                                              Eliminar
                                          </a>  --}}
                                      </td>
                                    </tr>
                                    @endif
                                    <tr>
                                       @if ($anual)
                                            <td>{{$anual->tipo_formula}}</td>
                                      <td>{{$anual->fecha_inicial}}</td>
                                      <td>{{$anual->fecha_final}}</td>
                                       @endif
                                    </tr>
                                    {{-- @include('Condicion_Contrato.delete') --}}
                        
                                      
                                    </tbody>
                                  </table>
                            
                            </div>

                        
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    </div>

                  </div>
              
                {{-- </section> --}}

            </form>

      
@endsection


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