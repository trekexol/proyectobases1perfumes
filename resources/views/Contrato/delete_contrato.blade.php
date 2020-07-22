<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="modal-delete-{{$contrato->id_contrato}}">
    <form action="{{action('ContratoController@destroy', $contrato->id_contrato)}}" method="POST">
            @method('DELETE')
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-danger">
                        <div class="modal-header">
                        <h4 class="modal-title">Eliminar Proveedor</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        <div class="modal-body">
                            <p>¿Esta seguro que quiere eliminar toda la informacion del contrato?</p>
                            <p>Para volver a hacer un contrato hay que generar nuevamente una nueva evaluacion</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-outline-light">Eliminar</button>
                        </div>
                </div>
            </div>
        </form>
    </div>
    
    {{-- id="modal-delete-{{$example->pk}}" --}}
    
    