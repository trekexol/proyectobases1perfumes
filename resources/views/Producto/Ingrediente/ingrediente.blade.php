@extends('adminlte::page')

@section('title', 'Producto')

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
                <section class="content">

                    <!-- Default box -->
                    <div class="card card-solid">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 col-sm-6">
                                <h3 class="d-inline-block d-sm-none">Nombre Producto</h3>
                                    
                            <div class="col-12">
                              <img src="https://www.iff.com/~/media/Images/I/IFF-V2/content-images/signpost/image-content-signpost/lmr-overview-2.jpg?h=298&la=en&w=560" class="product-image" alt="Imagen Producto">
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <h3 class="my-3">Nombre Producto</h3>
                            <p>Descripcion Producto</p>
              
                            <hr>
                            <div class="row">
                                <div class="col-7">
                                    <h4>Ml. Disponibles</h4>
                             <div class="btn-group btn-group-toggle" data-toggle="buttons">
                              <label class="btn btn-success text-center active">
                                <input type="radio" name="volumen" id="volumen1" value="15" autocomplete="off" checked="checked">
                                15 ml.
                                <br>
                                
                              </label>
                              <label class="btn btn-success text-center">
                                <input type="radio" name="volumen" id="volumen2" value="50" autocomplete="off">
                                50 ml.
                                <br>
                                
                              </label>
                              <label class="btn btn-success text-center">
                                <input type="radio" name="volumen" id="volumen3" value="100" autocomplete="off">
                                100 ml.
                                <br>
                               
                              </label>
                              <label class="btn btn-success text-center">
                                <input type="radio" name="volumen" id="volumen4" value="1000" autocomplete="off">
                                1000 ml.
                                <br>
                                
                              </label>
                            </div> 
                                </div>
                                <div class="col-5">
                                    <h4>Cant. Disponible</h4>
                                    <select class="form-control col-3" name="cantidad" id="cantidad">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                      </select>
                                </div>
                            </div>
                            
                            <div class="bg-gray py-2 px-3 mt-4">
                              <h2 class="mb-0" >
                                <input type="text" style="border: none; background: transparent; " id="precio" value="" readonly>
                              </h2>
                            </div>
              
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary btn-lg btn-flat">
                                <i class="fas fa-cart-plus fa-lg mr-2"></i> 
                                Agregar al Carro
                                </button>
                                
                            </div>
              
                          </div>
                        </div>
                        <div class="row mt-4">
                          <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                              <a class="nav-item nav-link" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="false">Descripcion Disolvente</a>
                              <a class="nav-item nav-link active" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="true">Descripcion Fijador</a>
                              <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Descripcion Visual</a>
                              <a class="nav-item nav-link" id="product-proceso-tab" data-toggle="tab" href="#product-proceso" role="tab" aria-controls="product-proceso" aria-selected="false">Proceso</a>
                              <a class="nav-item nav-link" id="product-familia-tab" data-toggle="tab" href="#product-familia" role="tab" aria-controls="product-familia" aria-selected="false">Familia Aromatica</a>
                            </div>
                          </nav>
                          <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Descripcion Disolvente </div>
                            <div class="tab-pane fade active show" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Descripcion Fijador </div>
                            <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Descripcion Visual </div>
                            <div class="tab-pane fade" id="product-proceso" role="tabpanel" aria-labelledby="product-proceso-tab"> Proceso </div>
                            <div class="tab-pane fade" id="product-familia" role="tabpanel" aria-labelledby="product-familia-tab"> Familia Aromatica </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
              
                  </section>

            </form>

      
@endsection

@section('js')

{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> --}}
    <script>

$(document).ready(function() {
    $('#states').select2();
});
        $('form[id="example"]').validate({
  rules: {
    name: {
        required: true,
        minlength: 2,
    },
    lastname: 'required',
    fecha_nacimiento: {
      required: true,
    //   email: true,
    },
  },
  messages: {
    name: 'Este campo es requerido',
    lastname: 'Este campo es requerido',
    fecha_nacimiento: 'Este campo es requerido',
    name: {
        minlength: 'El nombre tiene que tener al menos dos letras'
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
            $(function() {
        //Initialize country
        $('input[name=volumen]:first').attr('checked', true);   //Set first radio button (United States)
        //Enable changes to the country selection and change page text as the selections change    
        $('input[name=volumen]').change(function()  {
            // change the page per this logic
            switch ($('input[name=volumen]:checked').val()) {
                case '15':
                    $('#precio').val('{{$e->name}}'); break;
                case '50':
                    $('#precio').val('{{$e->lastname}}'); break;
                default:
                    $('#precio').val('precio3');
                
    
            };

            @for ($i = 15; $i < 17; $i++)
                    this.alert('{{$i}}')
            @endfor
          
        }).change();
    });
    </script>

@stop