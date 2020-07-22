<<<<<<< HEAD
 <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="modal-delete-{{$envio->id}}">
    <form action="{{action('Forma_EnvioController@getIndex', $envio->id)}}" method="POST">
=======
 <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="modal-delete-{{$variable->fecha_inicio}}">
    <form action="{{action('VariableFormulaController@getIndex', $variable->fecha_inicio)}}" method="POST">
>>>>>>> 3bbc3d76c4f39d60c685f25c520ae776f7916efa
        @method('DELETE')
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-danger">
                    <div class="modal-header">
<<<<<<< HEAD
                    <h4 class="modal-title">Eliminar forma de envio</h4>
=======
                    <h4 class="modal-title">Eliminar variable</h4>
>>>>>>> 3bbc3d76c4f39d60c685f25c520ae776f7916efa
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    <div class="modal-body">
<<<<<<< HEAD
                        <p>Esta seguro que quiere eliminar la forma de envio?</p>
=======
                        <p>Esta seguro que quiere eliminar la variable?</p>
>>>>>>> 3bbc3d76c4f39d60c685f25c520ae776f7916efa
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-outline-light">Eliminar</button>
                    </div>
            </div>
        </div>
    </form>
</div>

<<<<<<< HEAD
{{-- id="modal-delete-{{$envio->id}}" --}}
=======
{{-- id="modal-delete-{{$variable->fecha_inicio}}" --}}
>>>>>>> 3bbc3d76c4f39d60c685f25c520ae776f7916efa

