@extends('adminlte::page')

@section('title', 'Membresia')

@section('content_header')
    <h1>Membresia</h1>
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
              <div class="col-6">
             
                    @if(!$membresia_productor->fecha_final)
                    <h3 align="center">Su membresia se Encuentra Activa</h3>
                    <h3 align="center">desde la fecha {{$membresia_productor->fecha_inicial}}</h3>
                      
              
                     @else
                     <h3 align="center" style="color:#FF0000";>Su membresia se Encuentra Inactiva</h3>
                    <h3 align="center">Se vencio en fecha {{$membresia_productor->fecha_final}}</h3>
                     @endif
               
             
                   @include('Contrato.search')  
              </div>
           </div> 
        </div>
        <div class="card-body p-0" style="display: block;">
            @if ($historial)
            
          <table class="table">
            <thead>
              <tr>
                
               
                <th>Fecha Inicial</th>
                <th>Fecha Final</th>
                <th>Tipo</th>
                
               
              </tr>
            </thead>
            <tbody>
             
              @foreach ($historial as $var)
              <tr>
                
                <td>{{$var->fecha_inicial}}</td>
                <td>{{$var->fecha_final}}</td>
                <td>{{$var->tipo}}</td>
                
                
              </tr>

              @endforeach 
             
              
              
            </tbody>
          </table>
          @else
          <h5 class="d-flex justify-content-center">Este productor aun no tiene Membresias registradas</h5>
          @endif
        </div>
        <!-- /.card-body -->
        <div class="card-footer" style="display: block;">
            <div class="d-flex justify-content-sm-end">
               
               </div>
               <div class="row">
                   <div class="col-6 ">

                   @if(!$membresia_productor->fecha_final)
                   <br>
                   <a href="{{ action('Miembro_IfraController@menu_membresia', $productor->id) }}" class="btn btn-danger btn-sm">
                        Cancelar Membresia
                    </a>
                    @else
                   <br>
                    <a href="{{ action('Miembro_IfraController@menu_membresia', $productor->id) }}" class="btn btn-info btn-sm">
                        Activar Membresia
                    </a>
                    
               
             
                   
                   </div>
                   <div class="col-6">
                   <h4 align="center" style="color:#FF0000";>Active su membresia para </h4>
                    
                    <h4 align="center"  style="color:#FF0000";>poder realizar la Evaluacion Inicial</h4>
                </div>
                @endif
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