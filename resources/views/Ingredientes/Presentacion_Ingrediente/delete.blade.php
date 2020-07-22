<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="modal-delete-1">
<form action="{{action('P_IngredientesController@destroy', $i->pc)}}" method="POST">
        @method('DELETE')
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-danger">
                    <div class="modal-header">
                    <h4 class="modal-title">Eliminar Ingrediente</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    <div class="modal-body">
                        <p>Esta seguro que quiere eliminar el ingrediente:  {{$i->pc}}?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-outline-light">Eliminar</button>
                    </div>
            </div>
        </div>
    </form>
</div>

{{-- id="modal-delete-{{$i->pc}}" --}}