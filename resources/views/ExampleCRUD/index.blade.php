@extends('adminlte::page')

@section('title', 'Example')

@section('content_header')
    <h1>Example</h1>
@stop

@section('content')
<section class="content">
   
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <div class="row">
            <div class="col-9">
             @include('ExampleCRUD.newBtn')
            </div>
            <div class="col-3">
                 @include('ExampleCRUD.search')  
            </div>
         </div>
      </div>
      <div class="card-body p-0" style="display: block;">
      </div>
      <!-- /.card-body -->
      <div class="card-footer" style="display: block;">
       <div class="d-flex justify-content-sm-end">
        {{-- {{$examples->render()}} --}}
       </div>
      </div>
      <!-- /.card-footer-->
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