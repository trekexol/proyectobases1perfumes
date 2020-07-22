@extends('adminlte::page')

@section('title', 'Condicion de Contrato')

@section('content_header')
    <h1>Condicion de Contrato</h1>
@stop

@section('content')
<section class="content">
   
    <div class="card">
      <div class="card-header">
        <div class="row">
            <div class="col-9">
             {{-- @include('Condicion_Contrato.newBtn') --}}
            </div>
            <div class="col-3">
                <form action="{{ action('PaisController@index') }}" method="GET">
                    @method('GET')
                @csrf
                <div class="input-group input-group-sm ">
                    <input type="text" placeholder="Buscar" name="buscar" class="form-control">
                    <span class="input-group-append">
                      <button class="btn btn-info btn-flat" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                    </span>
                  </div>
                </form>
            </div>
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