<div id="eliminarCargoModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
        <div class="modal-content" style="border-radius: 3px;">
            <form id="eliminarCargo" action="eliminarCargo.php" method="POST" role="form">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Cargo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>¿Está seguro que desea eliminar este cargo?</label>
                        <input type="text" name="txtNombreCargo" id="name" class="form-control" readonly>
                        <input type="hidden" name="txtIdCargo" id="id">
                    </div>
                    <p class="text-danger"><small>Esta acción no se puede deshacer.</small></p>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-danger" value="Eliminar">
                    </div>
            </form>
        </div>
    </div>
</div>
