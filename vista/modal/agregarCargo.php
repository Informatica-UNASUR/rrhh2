<div id="agregarCargoModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="nuevoCargo" action="registroCargo.php" method="POST" role="form">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Cargo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre del cargo</label>
                        <input type="text" name="txtNombreCargo"  id="nombreCargo" class="form-control">
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-success" value="Agregar">
                </div>
            </form>
        </div>
    </div>
</div>
