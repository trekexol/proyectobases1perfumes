<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="modal-delete-{{$renovacion->id}}">
    <form action="{{action('RenovacionController@destroy', $renovacion->id)}}" method="POST">
        @method('DELETE')
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-danger">
                    <div class="modal-header">
                    <h4 class="modal-title">Eliminar renovacion</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    <div class="modal-body">
                        <p>Esta seguro que quiere eliminar la renovacion:  {{$renovacion->id}}?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-outline-light">Eliminar</button>
                    </div>
            </div>
        </div>
    </form>
</div>

{{-- id="modal-delete-{{$renovacion->id}}" --}}