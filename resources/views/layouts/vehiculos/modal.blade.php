<!-- id modal permite que por cada pagina del index va aparecer un modal  -->
<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$v->id_vehiculo}}">
    {{Form::open(array('action'=>array('App\Http\Controllers\VehiculosController@destroy',$v->id_vehiculo),'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <!-- Span permite cerrar la ventana emergente  -->
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Liberar cupo parqueadero</h4>
            </div>
            <div class="modal-body">
                <p>Confirme si desea liberar el cupo del vehiculo en el parqueadero</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
        </div>
    </div>
    {{Form::close()}}
</div>