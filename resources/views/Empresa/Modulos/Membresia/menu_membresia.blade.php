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
                    <h3 align="center">Desea Cancelar su membresia?</h3>
                    <h3 align="center">Activa desde la fecha {{$membresia_productor->fecha_inicial}}</h3>
                      
                    
                     @else
                     <h3 align="center" style="color:#FF0000";>Su membresia se Encuentra Inactiva</h3>
                    <h3 align="center">Se vencio en fecha {{$membresia_productor->fecha_final}}</h3>
                     @endif
               
             
                  
              </div>
           </div> 
        </div>
        <div class="card-body" >
   
            
         
            
       @if($membresia_productor->fecha_final)
       <form action="{{action('Miembro_IfraController@activar_membresia', $membresia_productor->id_productor)}}" method="post" autocomplete="off" id="vars" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="fecha_final" value="{{$membresia_productor->fecha_final}}">
						 
              <div class="col-6">
               
                    <div class="form-group">
                        <label class="text-sm">Fecha Inicial: </label>
                        <input type="date" class="form-control form-control-sm" name="fecha_inicial" value="{{$fecha_actual}}"id="fecha_inicial" placeholder="fecha inicial">
                        <span class="text-danger">{{ $errors->first('fecha_inicial') }}</span>
                    </div>
             
             </div>
             <div class="col-6">

                        <div class="form-group">
                            <label class="text-sm">Tipo</label>
                            <select class="custom-select custom-select-sm" name="tipo" id="tipo">
                                <option value="Principal">Principal</option>
                                <option value="Secundario">Secundario</option>
                                <option value="Asociación Nacional">Asociación Nacional</option>
                            </select>
                        </div>
                        </div>
                      
            @else
            <form action="{{action('Miembro_IfraController@update', $membresia_productor->id)}}" method="post" autocomplete="off" id="validate" enctype="multipart/form-data">
              @method('PUT')
              @csrf
            <div class="col-6">

            <input type="hidden" name="id_productor" value="{{$membresia_productor->id_productor}}">

            <input type="hidden" name="fecha_inicial" value="{{$membresia_productor->fecha_inicial}}">
						       
               <div class="form-group">
                   <label class="text-sm">Fecha Cancelacion: </label>
                   <input type="date" class="form-control form-control-sm" name="fecha_final" value="{{$fecha_actual}}"id="fecha_final" placeholder="fecha cancelacion">
                   <span class="text-danger">{{ $errors->first('fecha_final') }}</span>
               </div>
        
            </div>
                   
                  @endif
                  <br>
              
              <div class="col-6">
               
               
                        <div class="form-group">
                        @if($membresia_productor->fecha_final)
                                <button type="submit" class="btn btn-primary">Activar</button>
                        @else
                        <button type="submit" class="btn btn-primary">Desactivar</button>
                        @endif
                                <a href=" {{ url('membresia', $membresia_productor->id_productor) }}"  class="btn btn-danger">Regresar</a> 
                        </div>
                        
                  
              
                    
               
           </div>
            </div>      
          </div>

         
        </form>



         
        </div>
        <!-- /.card-body -->
        <div class="card-footer" style="display: block;">
            <div class="d-flex justify-content-sm-end">
               
               </div>
               <div class="row">
                  
                   
               
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