<div id="editarContrasenaModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCrearUsuario" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="editarContrasena" action="" method="POST" role="form">
                <div class="modal-header">
                    <h4 class="modal-title">Cambiar Contraseña</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nueva contraseña</label>
                        <input type="password" name="txtContrasenaNueva"  id="contrasenaNueva" class="form-control" required>
                        <input type="hidden" name="txtIdUsuario" id="idUsuario" >
                        <input type="hidden" id="opcion" name="opcion" value="resetPassword" >
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-success" value="Actualizar contraseña">
                    </div>
            </form>
        </div>
    </div>
</div>
