<div class="modal fade modal-slide-in-rigth" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$item->id}}">
    {{Form::open(array('action'=>array('UserController@destroy',$item->id),'method'=>'delete'))}}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title">Eliminar usuario: {{$item->name}}</h4>
                </div>
                <div class="modal-body">
                    <p>Confirme si desea elimianar el usuario.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning">Confirmar</button>
                </div>
            </div>
        </div>
    {{Form::Close()}}
</div>
      