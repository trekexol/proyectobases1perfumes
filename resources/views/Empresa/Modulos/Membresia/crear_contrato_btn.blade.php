<form action="{{ action('ContratoController@store', ['productor'=>$productor->id, 'proveedor'=>$proveedor->id_proveedor]) }}" method="post">
    @csrf
        <div class="input-group input-group-sm justify-content-end" > 
            <button type="submit" class="btn btn-primary btn-small">Realizar Contrato</button>
        </div>
    </form>
    