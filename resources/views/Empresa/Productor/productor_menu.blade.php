<div class="card card-widget widget-user-2">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-info">
      <h5 class="widget-user-username">{{$productor->nombre}}</h5>
    </div>
    <div class="card-footer p-0">
      <ul class="nav flex-column">
      <li class="nav-item">
          <a href="{{ url('productores/'.$productor->id.'') }}" class="nav-link">
            Inicio
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('productores/'.$productor->id.'/contrato/index') }}" class="nav-link">
            Contratos
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            Catalogo
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/productores/'.$productor->id.'/formulas') }}" class="nav-link">
            Formula 
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ action('PedidoController@index', $productor->id) }}" class="nav-link">
            Pedidos <span class="float-right badge bg-danger">2</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ action('EvaluacionController@index', $productor->id) }}" class="nav-link">
            Evaluacion 
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ action('Miembro_IfraController@show', $productor->id) }}" class="nav-link">
            Membresia 
          </a>
        </li>
        
      </ul>
    </div>
  </div>