@extends('adminlte::page')

@section('title', 'Proveedor')

@section('content_header')

    <div class="row">
        <div class="col-6">
            <h1>Empresa - {{$proveedor->nombre}}</h1>
        </div>
        <div class="col-6">
            <div class="input-group input-group-sm justify-content-end">
                <div class="btn-group">
                    <a class="btn btn-warning btn-sm" href="{{ action('ProveedorController@reporte', $proveedor->id) }}" target="blank">
                        <i class="fas fa-file-download">
                        </i>
                    </a>
                    <a class="btn btn-info btn-sm" href="{{action('ProveedorController@edit', $proveedor->id)}}">
                        <i class="fas fa-pencil-alt">
                        </i>
                    </a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{$proveedor->id}}">
                        <i class="fas fa-trash">
                        </i>
                    </button>
                  </div>
            </div>
           
        </div>
    </div>
    @include('Empresa.Proveedor.eliminar_proveedor')
    
@stop

@section('content')
                <form action="" method="post" autocomplete="off" id="example" enctype="multipart/form-data">
                @csrf

                  <div class="row">

                    <div class="col-3">
                      @include('Empresa.Proveedor.proveedor_menu')
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
                            <h3 class="my-3">{{$proveedor->nombre}} </h3>
                            <div class="row">
                                <div class="col-6">
                                    <p>Telefono: +({{$proveedor->codigo}})-{{$proveedor->telefono}} </p>
                                    <p>Url: {{$proveedor->url}}</p>
                                    <p>Direccion: {{$proveedor->direccion}}, {{$proveedor->codigo_postal}}</p>
                                </div>

                                <div class="col-6">
                                    <p>Organizacion IFRA: {{$proveedor->tipo_miembro}} </p>
                                    <p>Tipo Empresa: Productor</p>
                                    <p>Activo:</p>
                                    
                                    @if ($asociacion)
                                    <p>Asociacion: {{$asociacion->nombre}}-{{$asociacion->iniciales}}</p>
                                        
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
              

            </form>

      
@endsection


