@extends('adminlte::page')

@section('title', 'Productor')

@section('content_header')
    <div class="row">
        <div class="col-6">
            <h1>Empresa  - {{$productor->nombre}}</h1>
        </div>
        <div class="col-6">
            <div class="input-group input-group-sm justify-content-end">
                <div class="btn-group">
                    <a class="btn btn-warning btn-sm" href="">
                        <i class="fas fa-file-download">
                        </i>
                    </a>
                    <a class="btn btn-info btn-sm" href="{{action('FraganciaController@edit', 1)}}">
                        <i class="fas fa-pencil-alt">
                        </i>
                    </a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{$productor->id}}">
                        <i class="fas fa-trash">
                        </i>
                    </button>
                  </div>
            </div>
           
        </div>
    </div>
    @include('Empresa.Productor.delete_productor')
    
@stop

@section('content')
                <form action="" method="post" autocomplete="off" id="example" enctype="multipart/form-data">
                @csrf
               
                  <div class="row">

                    <div class="col-3">
                      @include('Empresa.Productor.productor_menu')
                    </div>

                    <div class="col-9">
                         <!-- Default box -->
                    <div class="card card-solid">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-3">
                            <img src="https://ifrafragrance.org/images/default-source/member-logos/basfffcaa70776ce4bf99a855d50d4725267.png?sfvrsn=2e24717c_0" alt="" class="product-image"  >
                        </div>
                          <div class="col-9">
                            <h3 class="my-3">{{$productor->nombre}} </h3>
                            <div class="row">
                                <div class="col-6">
                                    <p>Telefono: +({{$productor->codigo}})-{{$productor->telefono}} </p>
                                    <p>Url: {{$productor->url}}</p>
                                    <p>Direccion: {{$productor->direccion}}, {{$productor->codigo_postal}}</p>
                                </div>

                                <div class="col-6">
                                    <p>Organizacion IFRA: {{$productor->tipo_miembro}} </p>
                                    <p>Tipo Empresa: Productor</p>
                                    <p>{{$activo}}</p> 
                                    @if ($asociacion)
                                    <p>Asociacion Nacional: {{$asociacion->nombre}}-{{$asociacion->iniciales}}</p>
                                    @endif
                                </div>
                            </div>
              
              
              
                          </div>
                        </div>
                        
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    </div>

                  </div>
              
                {{-- </section> --}}

            </form>

      


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


