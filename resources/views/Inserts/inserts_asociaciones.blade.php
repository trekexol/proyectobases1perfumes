@extends('adminlte::page')

@section('title', 'Registro de Productor')

@section('content')
<section class="content">
    <form action="{{action('AsociacionController@store')}}" method="post" autocomplete="off" id="empresa" enctype="multipart/form-data">    
        @csrf
        <div class="card">
        
    <div class="card-body">
        
          
        <h2>Datos del pais: </h2>

        <div class="row">
            <div class="col-6">
               
                    <label for="Nombre Productor">Nombre</label>
                    <input type="text" class="form-control form-control-sm" name="nombre" placeholder="Nombre Pais">
               

                <div class="form-group">
                    <label for="Nombre Productor">Region</label>
                    <input type="text" class="form-control form-control-sm" name="region" placeholder="Nombre Pais">
                </div>

                <div class="form-group">
                    <label for="Nombre Productor">Iniciales</label>
                    <input type="text" class="form-control form-control-sm" name="iniciales" placeholder="Nombre Pais">
                </div>

                <div class="form-group">
                    <label>Pais</label>
                    <select class="js-example-basic-single form-control-sm" name="pais" id="pais" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option selected="selected" data-select2-id="0">Seleccione</option>
                        @foreach ($pais as $p)
                      <option value="{{$p->id}}">{{$p->nombre}}</option>
                      @endforeach
                    </select>
                  </div>

            </div>

        </div>

        
    </div>

    <div class="card-footer">
        <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>
    </div>

    </div>
</form>
  </section>
@stop

@section('js')
    <script>
        $(document).ready(function() {
        $('#pais').select2();
    });
    </script>
@endsection