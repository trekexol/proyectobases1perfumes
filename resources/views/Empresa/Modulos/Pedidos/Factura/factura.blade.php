@extends('adminlte::page')

@section('title', 'Factura')

@section('content_header')
    <div class="row">
        <div class="col-6">
            <h1>Producto - Ingrediente IPC: #000-IPC</h1>
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
<div class="card">
    {{-- {{action('ExampleController@store')}} --}}
            <form action="" method="post" autocomplete="off" id="example" enctype="multipart/form-data">
            @csrf
                
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                  <div class="col-12">
                    <h4>
                      <i class="fas fa-globe"></i> AdminLTE, Inc.
                      <small class="float-right">Fecha: 2/10/2014</small>
                    </h4>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                    De
                    <address>
                      <strong>Admin, Inc.</strong><br>
                      795 Folsom Ave, Suite 600<br>
                      San Francisco, CA 94107<br>
                      Telefono: (804) 123-5432<br>
                      Correo: info@almasaeedstudio.com
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    Para
                    <address>
                      <strong>John Doe</strong><br>
                      795 Folsom Ave, Suite 600<br>
                      San Francisco, CA 94107<br>
                      Telefono: (555) 539-1037<br>
                      Correo: john.doe@example.com
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <b>Factura #007612</b><br>
                    <br>
                    <b>Orden ID:</b> 4F3S8J<br>
                    <b>Fecha de Pago:</b> 2/22/2014<br>
                    <b>Cuenta:</b> 968-34567
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
  
                <!-- Table row -->
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>Cant</th>
                        <th>Producto</th>
                        <th>Serial #</th>
                        <th>Descripcion</th>
                        <th>Subtotal</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>1</td>
                        <td>Call of Duty</td>
                        <td>455-981-221</td>
                        <td>El snort testosterone trophy driving gloves handsome</td>
                        <td>$64.50</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Need for Speed IV</td>
                        <td>247-925-726</td>
                        <td>Wes Anderson umami biodiesel</td>
                        <td>$50.00</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Monsters DVD</td>
                        <td>735-845-642</td>
                        <td>Terry Richardson helvetica tousled street art master</td>
                        <td>$10.70</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Grown Ups Blue Ray</td>
                        <td>422-568-642</td>
                        <td>Tousled lomo letterpress</td>
                        <td>$25.99</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
  
                <div class="row">
                  <!-- accepted payments column -->
                  <div class="col-6">
                    <p class="lead">Metodos de Pago:</p>
                    <img src="../../dist/img/credit/visa.png" alt="Visa">
                    <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                    <img src="../../dist/img/credit/american-express.png" alt="American Express">
                    <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
  
                    {{-- <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                      plugg
                      dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                    </p> --}}
                  </div>
                  <!-- /.col -->
                  <div class="col-6">
                    <p class="lead">Fecha de Pago 2/22/2014</p>
  
                    <div class="table-responsive">
                      <table class="table">
                        <tbody><tr>
                          <th style="width:50%">Subtotal:</th>
                          <td>$250.30</td>
                        </tr>
                        <tr>
                          <th>IVA (9.3%)</th>
                          <td>$10.34</td>
                        </tr>
                        <tr>
                          <th>Envio:</th>
                          <td>$5.80</td>
                        </tr>
                        <tr>
                          <th>Total:</th>
                          <td>$265.24</td>
                        </tr>
                      </tbody></table>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
  
                <!-- this row will not appear when printing -->
                <div class="row no-print">
                  <div class="col-12">
                    <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Imprimir</a>
                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                      <i class="fas fa-download"></i> Generar PDF
                    </button>
                  </div>
                </div>
              </div>


            </form>

      
@endsection
