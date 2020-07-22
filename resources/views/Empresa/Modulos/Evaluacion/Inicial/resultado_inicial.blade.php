@extends('adminlte::page')

@section('title', 'Contrato')

@section('content_header')
    <h1>Contrato</h1>
@stop

@section('content')
<section class="content">
   
    
  <div class="row">
    <div class="col-3">
      @include('Empresa.Productor.productor_menu')
    </div>

    <div class="col-9">
      <div class="card">
        <div class="card-header">
          <div class="row">
              <div class="col-9">
               {{-- @include('Contrato.newBtn') --}}
              </div>
              <div class="col-3">
                   {{-- @include('Contrato.search')   --}}
              </div>
           </div> 
        </div>
        <div class="card-body" style="display: block;"  onload="carga();">
            
            <div class="tab-pane fade active show" id="carga" aria-labelledby="custom-tabs-five-overlay-dark-tab">
                <div class="overlay-wrapper">
                  <div class="overlay dark">
                    <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                    <div class="text-bold pt-lg-5">Realizando Evaluacion Inicial...</div>
                    {{-- <div class="text-bold pt-lg-5">Loading...</div> --}}
                  </div>
                  
                <p style="color: white">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p style="color: white">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p style="color: white">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p style="color: white">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p style="color: white">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p style="color: white">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p style="color: white">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p style="color: white">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p style="color: white">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                
                </div>
              </div>
                <div style="display:none" id="resultado">
                    @if ($proveedores)
                    <h1>Todos estos proveedores Realizan Envios a tu(s) Pais(es)</h1>
                <table class="table">
                  <thead>
                    <tr>
                      
                      <th>Proveedor(es) Seleccionado(s)</th>
                      <th>Pais Origen</th>
                      <th>Pagina Web</th>
                      <th>Codigo Postal </th>
                      <th>Calle o Avenida</th>
                      
                      
                      <th style="width: 25%">Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  @for ($i = 0; $i < count($proveedores); $i++)
                    <tr>
                    <td>{{$proveedores[$i]->nombre_proveedor}}</td>
                    <td>{{$paises[$i]->nombre}}</td>
                    <td>{{$proveedores[$i]->pagina_web}}</td>
                    <td>{{$proveedores[$i]->codigo_postal}}</td>
                      <td>{{$proveedores[$i]->calle_avenida}}</td>
                     
                      <td class="justify-content-between">
                      @include('Empresa.Modulos.Evaluacion.Inicial.crear_contrato_btn')
                      </td>
                    </tr>
      
                    @endfor
                    
                  </tbody>
                </table>
                @else
                <h2>No Hay Proveedores Disponibles para su Pais </h2>
                <h2>o Estan Inactivos en el Ifra</h2>
                <br>
                @endif
                </div>
        </div>
        <!-- /.card-body -->
        {{-- <div class="card-footer" style="display: block;">
         <div class="d-flex justify-content-sm-end">
          {{$proveedores->render()}}
         </div>
        </div> --}}
        <!-- /.card-footer-->
      </div>
    </div>
  </div>

    <!-- /.card -->
  </section>

@stop

@section('js')

    <script>
         carga('carga');

         var carga;

          function carga() {
            carga = setTimeout(resultado, 3000);
          }

          function resultado() {
              document.getElementById("carga").style.display = "none";
              document.getElementById("resultado").style.display = "block";
          }

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