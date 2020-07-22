@extends('adminlte::page')

@section('title', 'Pedido')

@section('content_header')
    <div class="row">
        <div class="col-6">
            <h1>{{$productor->nombre}} > Realizar Pedido</h1>
        </div>
        <div class="col-6">
            <div class="input-group input-group-sm justify-content-end">
                <div class="btn-group">
                    <a class="btn btn-info btn-sm" href="{{action('IngredienteController@edit', 1)}}">
                        <i class="fas fa-pencil-alt">
                        </i>
                    </a>
                    {{-- data-target="#modal-delete-{{$example->pk}}" --}}
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-1">
                        <i class="fas fa-trash">
                        </i>
                    </button>
                  </div>
            </div>
           
        </div>
    </div>
    @include('Producto.Fragancia.delete')
    
@stop

@section('content')

    <div class="row">
        <div class="col-3">
            @include('Empresa.Productor.productor_menu')
            </div>
            
            <div class="col-9">
                <div class="card">
                            <form action="{{ action('DetallePedidoController@store', ['productor'=> $productor->id, 'pedido'=> $pedido->id]) }}" method="post" autocomplete="off" id="example" enctype="multipart/form-data">
                            @csrf
                     
                  
                                <!-- Table row -->
                                <div class="row">
                                  <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                      <thead>
                                      <tr>
                                        <th></th>
                                        <th>Cant</th>
                                        <th>Producto</th>
                                        <th>Serial #</th>
                                        <th>Descripcion</th>
                                        <th>Precio</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                        @for ($i = 0; $i < 5; $i++)
                                        <tr>
                                            <td class="col-1"><input type="checkbox" name="producto[{{$i}}][id]" value="{{$i}}"></td>
                                            <td class="col-1"><input type="text" placeholder="Cant." class="form-control form-control-sm" name="producto[{{$i}}][cant]"></td>
                                            <td>Ingrdiente </td>
                                            <td>Codigo</td>
                                            <td>Descripcion</td>
                                            <td>$Precio</td>
                                          </tr>
                                        @endfor
                                      
                                      </tbody>
                                    </table>

                                     <!-- this row will not appear when printing -->
                                 <div class="row no-print">
                                    <div class="col-12">
                                      <button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> 
                                        Realizar Pedido
                                      </button>
                                    </div>
                                  </div>
                                </div>
                  
                  
                                  </div>
                                  
                                  <!-- /.col -->
                                </div>

                                <!-- /.row -->
                  
                                
                            </form>
                
            </div>
                  
    </div>

@endsection
