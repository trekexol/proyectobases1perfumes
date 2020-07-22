@extends('adminlte::page')

@section('title', 'Registrar Forma Pago')

@section('content_header')
    <h1>Registrar Forma Pago</h1>
@stop

@section('content')
<div class="card">
  <div class="card-header">
      {{-- <h1>Crear Obra</h1> --}}
      {{-- {{var_dump($errors)}} --}}
      <h2>Detalles Generales</h2>
  </div>
  <div class="card-body">
      <div class="row">
          <div class="col-4">
              <form action="{{action('Forma_PagoController@store', ['proveedor'=>$proveedor->id])}}" method="post" autocomplete="off" id="variable" enctype="multipart/form-data">
              @csrf
          <div class="example_form">
              <div class="form-group">
                  <label class="text-sm">Nombre: </label>
                  <input type="text" class="form-control form-control-sm" name="nombre" id="nombre" placeholder="Nombre">
                  <span class="text-danger">{{ $errors->first('nombre') }}</span>
              </div>

              <div class="form-group">
                <label class="text-sm">Plazo Entrega: </label>
                <input type="text" class="form-control form-control-sm" name="plazo_dias" id="plazo_dias" placeholder="Plazo Entrega: ">
                <span class="text-danger">{{ $errors->first('plazo_dias') }}</span>
            </div>

            <div class="form-group">
              <label class="text-sm">Tipo: </label>
              <input type="text" class="form-control form-control-sm" name="tipo" id="tipo" placeholder="Tipo">
              <span class="text-danger">{{ $errors->first('tipo') }}</span>
          </div>

              
          </div>    
          
          </div>
          <div class="col-4">
            <div class="form-group">
              <label class="text-sm">Descripcion: </label>
              <input type="text" class="form-control form-control-sm" name="descripcion" id="descripcion" placeholder="Descripcion">
              <span class="text-danger">{{ $errors->first('descripcion') }}</span>
          </div>

          <div class="form-group">
            <label class="text-sm">Cuotas: </label>
            <input type="text" class="form-control form-control-sm" name="cuotas" id="cuotas" placeholder="Cuotas">
            <span class="text-danger">{{ $errors->first('cuotas') }}</span>
        </div>
        <div class="form-group">
          <label class="text-sm">Porcentaje Cuotas: </label>
          <input type="text" class="form-control form-control-sm" name="porcentaje_cuotas" id="cuotas" placeholder="Porcentaje Cuotas">
          <span class="text-danger">{{ $errors->first('cuotas') }}</span>
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
          </form>
  </div>
  
</div>

     
</div>

</form>
@endsection

@section('js')

{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> --}}
    <script>

$(document).ready(function() {
    $('#states').select2();
});
        $('form[id="variable"]').validate({
  rules: {
  
    nombre: {
      required: true,
    },
    tipo: {
      required: true,
    },
    plazo_dias: {
      required: true,
    },
    descripcion: {
      required: true,
      minlength: 2,
    },
  },
  messages: {
    id_proveedor: 'Este campo es requerido',
    nombre: 'Este campo es requerido',
    tipo: 'Este campo es requerido',
    plazo_dias: 'Este campo es requerido',
    descripcion: {
        minlength: 'El transporte tiene que tener al menos dos letras'
      }
  },
  errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
});

    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });

    </script>

    <script>

    </script>
@stop