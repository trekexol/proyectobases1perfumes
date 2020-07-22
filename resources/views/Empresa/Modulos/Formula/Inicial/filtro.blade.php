<form action="{{ action('CriterioInicialController@index', $productor->id) }}" method="GET">
    @method('GET')
@csrf
    <div class="row justify-content-end" >
        <div class="col-2">
            fitro de busqueda
        
        </div>
        <div class="col-1">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="filtro" value="todas">
                <label class="form-check-label">Todas</label>
                
              </div>
        </div>
        <div class="col-1">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="filtro" value="vencidas">
                <label class="form-check-label">Vencidas</label>
                
              </div>
        </div>
        <div class="col-1">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="filtro" value="vigentes">
                <label class="form-check-label">Vigentes</label>
                
              </div>
        </div>
        <div class="col-2">
            <button class="btn btn-info btn-sm" type="submit">
                <i class="fas fa-search">
                    <span>Buscar</span>
                </i>

              </button>
        </div>
    </div>
      
</form>