<?php include 'partials/head.php'; ?>
<?php
include '../controlador/UsuarioControlador.php';

if (isset($_SESSION["usuario"])) {

} else {
    header("location:index.php");
}
?>
<?php include 'partials/menu.php'; ?>

<div class="container listado">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    ACTUALIZACIÓN DE CONTRASEÑA
                </div>
                <div class="card-body">
                    <form id="password_update" action="passwordUpdate.php" method="POST" role="form">
                        <div class="form-group col-lg-12">
                            <label for="password">Contraseña actual</label>
                            <input type="password" name="txtContrasena" id="contrasenaActual" class="form-control" placeholder="Ingrese su contraseña...">
                            <input type="hidden" id="usuario" name="txtUsuario" value="<?php echo $_SESSION["usuario"]["usuario"]; ?>">
                            <input type="hidden" id="idUsuario" name="txtIdUsuario" value="<?php echo $_SESSION["usuario"]["idUsuario"]; ?>">
                            <input type="hidden" id="opcion" name="opcion" value="updatePassword" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="password">Nueva contraseña</label>
                            <input type="password" name="txtNuevaContrasena" id="contrasenaNueva" class="form-control" placeholder="Ingrese su nueva contraseña...">
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="password">Confirmar contraseña</label>
                            <input type="password" name="txtConfirmarContrasena" id="contrasenaConfirmar" class="form-control" placeholder="Confirme su nueva contraseña...">
                            <p class="text-danger"><small>Esta acción requiere volver a iniciar sesión.</small></p>
                        </div>
                        <div class="modal-footer">
                            <input id="agregar" type="submit" class="btn btn-success" value="Cambiar contraseña">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>
