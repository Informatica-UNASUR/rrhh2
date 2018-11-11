<div id="editarCargoModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="editarCargo" action="editarCargo.php" method="POST" role="form">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Cargo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre del cargo</label>
                        <input type="text" name="txtNombreCargo"  id="edit_name" class="form-control" required>
                        <input type="hidden" name="txtIdCargo" id="edit_id" >
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-success" value="Actualizar">
                    </div>
            </form>
        </div>
    </div>
</div>
