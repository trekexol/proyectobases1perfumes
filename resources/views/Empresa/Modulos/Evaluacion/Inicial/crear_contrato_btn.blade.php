<form action="{{ action('ContratoController@store', ['productor'=>$productor->id, 'proveedor'=>$proveedores[$i]->id_proveedor]) }}" method="post">
    @csrf
        <div class="input-group input-group-sm justify-content-end" > 
            <button type="submit" class="btn btn-primary btn-small">Evaluar</button>
        </div>
    </form>
    