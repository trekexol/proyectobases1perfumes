@extends('adminlte::page')

@section('title', 'Nuestros Proveedores')

@section('content')
<section class="content">
    <div class="card">
         
      <div class="card-body">
        <div class="row">
            <div class="col-6">
                <div class="card-body">
                    <div class="card-title">
                        <h2>¡Conoce a nuestros Proveedores!</h2>
                    </div>
                    <div class="card-title">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nunc justo, hendrerit vitae nulla quis, venenatis lobortis mi. 
                          Nam quis felis faucibus dolor dignissim fermentum. Nullam mollis mi turpis, ut viverra arcu elementum eu.
                           Donec quis mauris ultricies, rhoncus risus a, hendrerit est. Sed sed consectetur neque. Nullam sed ullamcorper dui. Donec accumsan faucibus rutrum. Ut risus odio, ornare sit amet fringilla at, facilisis at velit. Praesent eu augue eros. Nunc faucibus ipsum at mauris feugiat, in finibus neque dapibus. Vestibulum ut hendrerit nunc. Donec quis enim ligula. Aenean euismod porta quam, eget egestas ante dapibus in. Vivamus nec fermentum nisi, id maximus eros.
                           <br>
                    </div>
                    
                </div>
            </div>
            <div class="col-6">
                <div class="card-body">
                    <div class="card-title">
                        <h4>¿Quieres formar parte de nuestro equipo de Proveedores?</h4>
                    </div>
                    <div class="card-title">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nunc justo, hendrerit vitae nulla quis, venenatis lobortis mi. 
                          Nam quis felis faucibus dolor dignissim fermentum. Nullam mollis mi turpis, ut viverra arcu elementum eu.
                           Donec quis mauris ultricies, rhoncus risus a, hendrerit est. Sed sed consectetur neque. Nullam sed ullamcorper dui. Donec accumsan faucibus rutrum. Ut risus odio, ornare sit amet fringilla at, facilisis at velit. Praesent eu augue eros. Nunc faucibus ipsum at mauris feugiat, in finibus neque dapibus. Vestibulum ut hendrerit nunc. Donec quis enim ligula. Aenean euismod porta quam, eget egestas ante dapibus in. Vivamus nec fermentum nisi, id maximus eros.
                    </div>
                    <a href="{{ action('ProveedorController@create') }}">¡Pues haz click aqui!</a>
                </div>
            </div>
        </div>
        
        <div class="row">

            <div class="col-3">
                
                <div class="card-body">
                <div class="card-title">
                    <h5>Filtro de Busqueda</h5>
                </div>

                <div class="card-text">
                        <div class="form-group">
                            <div class="form-check">
                                <label>Asociaciones</label><br>
                                <input class="form-check-input" type="checkbox" name="asociacion" value="true">
                                <label class="form-check-label">Asociacion</label>
                            </div>
                            <div class="form-check">
                                <label>Miembro Ifra</label><br>
                                <input class="form-check-input" type="checkbox" checked="" name="miembro[]" value="Principal">
                                <label class="form-check-label">Principal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="miembro[]" value="Secundario">
                                <label class="form-check-label">Secundario</label>
                            </div>
                          </div>
                        <button type="submit" class="form-control-sm btn-info"> Buscar</button>
        
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card-body">
                    <div class="card-text">
                        @foreach ($proveedores as $p)
                            <h3><a href="{{ action('ProveedorController@show', $p->id) }}">{{$p->nombre}}</a></h3>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-5">
                {{-- <img src="https://www.20minutos.es/uploads/imagenes/2020/04/06/coty-fabrica-16-000-unidades-diarias-de-geles-hidroalcoholicos.jpeg" alt="" > --}}
            </div>


            {{-- @for ($i = 0; $i < 9; $i++)
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ action('ProductorController@show', 1) }}">
                            <img src="https://ifrafragrance.org/images/default-source/member-logos/basfffcaa70776ce4bf99a855d50d4725267.png?sfvrsn=2e24717c_0" alt="" style="width: 250px; height: 250px">
                        </a>
                    </div>
                </div>
              </div>
            @endfor --}}
        </div>
        
          </div>
    </div>
  </section>
@stop

