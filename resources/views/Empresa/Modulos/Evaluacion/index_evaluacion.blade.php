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
            @if ($evaluaciones->first())
            
          <table class="table">
            <thead>
              <tr>
                
                <th>Proveedor</th>
                <th>Fecha</th>
                <th>Puntuacion</th>
                <th>Tipo</th>
                <th style="width: 25%">Opciones</th>
              </tr>
            </thead>
            <tbody>
             
              @foreach ($evaluaciones as $evaluacion)
              <tr>
                
                <td>{{$evaluaciones->nombre}}</td>
                <td>{{$evaluaciones->fecha}}</td>
                <td>{{$evaluaciones->puntuacion}}</td>
                <td>{{$evaluaciones->tipo}}</td>
                <td class="d-flex justify-content-between">
                   Informe
                </td>
              </tr>

              @endforeach 
             
              
              
            </tbody>
          </table>
          @else
          <h5 class="d-flex justify-content-center">Este productor aun no tiene evaluaciones realizadas</h5>
          @endif
        </div>
        <!-- /.card-body -->
        <div class="card-footer" style="display: block;">
            <div class="d-flex justify-content-sm-end">
                {{$evaluaciones->render()}}
               </div>
               <div class="row">
                   <div class="col-6 ">

                   @if(!$membresia_productor->fecha_final)
                   <a href="{{ action('EvaluacionController@evaluacionInicial', $productor->id) }}" class="btn btn-info btn-sm">
                        Realizar Evaluacion Inicial 
                    </a>
                    @else
                     <h4 align="center" style="color:#FF0000";>Active su membresia para </h4>
                    
                    <h4 align="center"  style="color:#FF0000";>poder realizar la Evaluacion Inicial</h4>
                    
               
             
                    @endif
                   </div>
                   <div class="col-3 d-flex justify-content-sm-end">
                    Nueva evaluacion final
                </div>
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