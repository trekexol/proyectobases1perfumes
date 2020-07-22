<form action=" {{ url('productores/'.$productor->id.'/contrato/5')}}" method="post">
@csrf
    <div class="input-group input-group-sm justify-content-end" > 
        <button type="submit" class="btn btn-primary btn-small">Agregar Contrato</button>
    </div>
</form>


{{-- IMPORTANTE --}}