<!-- Modal Confirm Delete-->
<div class="modal fade" id="modal-delete-{{$empleado->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('empleado.destroy', $empleado->id)}}" method="post">
            <input name="_method" type="hidden" value="DELETE">
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿ Desea eliminar al registro {{$empleado->nombre}} ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Final Modal-->