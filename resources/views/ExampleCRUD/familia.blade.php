@extends('adminlte::page')

@section('title', 'Crear Example')

@section('content_header')
    <h1>Crear Example</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        {{-- <h1>Crear Obra</h1> --}}
        {{-- {{var_dump($errors)}} --}}
        <h2>Detalles Generales</h2>
    </div>
    <div class="card-body">
        <div class="container"style="max-width: 700px;">

            <div class="text-center" style="margin: 20px 0px 20px 0px;">
                <span class="text-secondary">Add or Remove Input Fields Dynamically using jQuery</span>
            </div>
    
            <form action="{{action('FamiliaController@store')}}" method="post" autocomplete="off" id="example" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <input type="text" name="nombre" class="form-control m-input" placeholder="Nombre Familia" autocomplete="off">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="descripcion" class="form-control m-input" placeholder="Descripcion Familia" autocomplete="off">
                        </div>
                        <div id="inputFormRow">
                            <div class="input-group mb-3">
                                <input type="text" name="title[]" class="form-control m-input" placeholder="Clase Familia" autocomplete="off">
                                <div class="input-group-append">
                                    <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                </div>
                            </div>
                        </div>
    
                        <div id="newRow"></div>
                        <button id="addRow" type="button" class="btn btn-info">Add Row</button>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>
            </form>
        </div>
    
</div>

       
@endsection

@section('js')

{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> --}}
    <script>
  $("#addRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<input type="text" name="title[]" class="form-control m-input" placeholder="Enter title" autocomplete="off">';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
    </script>
@stop