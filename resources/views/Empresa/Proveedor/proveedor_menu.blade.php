<div class="card card-widget widget-user-2">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-info">
      <h5 class="widget-user-username">{{$proveedor->nombre}}</h5>
    </div>
    <div class="card-footer p-0">
      <ul class="nav flex-column">
        {{-- <li class="nav-item">
          <a href="{{ url('productores/'.$proveedor->id.'/contrato/index') }}" class="nav-link">
            Contratos
          </a>
        </li> --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            Catalogo
          </a>
        </li>
        {{-- <li class="nav-item">
          <a href="#" class="nav-link">
            Pedidos <span class="float-right badge bg-danger">2</span>
          </a>
        </li> --}}
        <li class="nav-item">
          <a href="{{ action('Forma_PagoController@index', $proveedor->id) }}" class="nav-link">
            Forma Pago 
          </a>
        </li>
        <li class="nav-item">
            <a href="{{ action('Forma_EnvioController@index', $proveedor->id) }}" class="nav-link">
              Forma Envio 
            </a>
          </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            Membresia 
          </a>
        </li>
      </ul>
    </div>
  </div>