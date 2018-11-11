<div class="modal fade" id="agregarRolModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCrearRol" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCrearRol">Registro de roles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="nuevoRol" action="registroRol.php" method="POST" role="form">
                    <div class="form-group">
                        <label for="usuario">Nombre del rol</label>
                        <input type="text" name="txtNombreRol" id="nombrerol" class="form-control" required placeholder="Ingrese el nombre del rol">
                    </div>
                    <div class="form-group">
                        <label for="password">Descripción</label>
                        <textarea name="txtDescripcion" class="form-control" required placeholder="Ingrese la descripción"></textarea>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-success" value="Agregar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
