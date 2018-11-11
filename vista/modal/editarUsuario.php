<div class="modal fade" id="editarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCrearUsuario" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editarUsuario" action="editarUsuario.php" method="POST" role="form">
                    <div class="form-group col-lg-12">
                        <label for="usuario">Nombre del Usuario</label>
                        <input type="text" name="txtNombreUsuario" id="edit_name" class="form-control" required>
                        <input type="hidden" name="txtIdUsuario" id="edit_id" >
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="fechaAlta">Fecha de alta</label>
                        <input type="text" name="txtFechaAlta" id="edit_fecha" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="estado">Estado</label>
                        <select class="custom-select" name="txtEstado" id="edit_estado" required>
                            <option selected value="1">Activado</option>
                            <option value="0">Desactivado</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="rol">Rol</label>
                        <select class="custom-select" name="txtRol" id="edit_rol" required>
                            <option value="" selected disabled>Seleccione el rol</option>
                            <option value="1">Administrador</option>
                            <option value="2">Usuario</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-success" value="Actualizar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

