<div class="modal fade" id="agregarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCrearUsuario" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCrearUsuario">Registro de usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="nuevoUsuario" action="registroCode.php" method="POST" role="form">
                    <div class="form-group col-lg-12">
                        <label for="usuario">Usuario</label>
                        <input type="text" name="txtUsuario" id="usuario" class="form-control" placeholder="Ingrese su usuario...">
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="password">Password</label>
                        <input type="password" name="txtPassword" id="password" class="form-control" placeholder="Ingrese su contraseña...">
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="estado">Estado</label>
                        <select class="custom-select" name="txtEstado" id="estado">
                            <option selected value="1">Activado</option>
                            <option value="0">Desactivado</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="rol">Rol</label>
                        <select class="custom-select" name="txtRol" id="rol" required>
                            <option value="" selected disabled>Seleccione el rol</option>
                            <option value="1">Administrator</option>
                            <option value="2">Estandar</option>
                        </select>
                        <div>
                            <p class="msgExiste"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input id="agregar" type="submit" class="btn btn-success" value="Agregar" disabled>
                    </div>
                </form>
                <div id="errors"></div>
            </div>
        </div>
    </div>
</div>
