<div id="editarRolModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="editarRol" action="editarRol.php" method="POST" role="form">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Rol</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre del Rol</label>
                        <input type="text" name="txtNombreRol"  id="edit_name" class="form-control" required>
                        <input type="hidden" name="txtIdRol" id="edit_id" >
                    </div>
                    <div class="form-group">
                        <label>Descripcion</label>
                        <input type="text" name="txtDescripcion"  id="edit_desc" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
                        <input id="actualizarRol" type="submit" class="btn btn-success" value="Actualizar">
                    </div>
            </form>
        </div>
    </div>
</div>
