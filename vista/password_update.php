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
                    <form id="nuevoUsuario" action="registroCode.php" method="POST" role="form">
                        <div class="form-group col-lg-12">
                            <label for="password">Contraseña actual</label>
                            <input type="password" name="txtContrasena" id="contrasenaActual" class="form-control" placeholder="Ingrese su contraseña...">
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="password">Nueva contraseña</label>
                            <input type="password" name="txtNuevaContrasena" id="contrasenaNueva" class="form-control" placeholder="Ingrese su nueva contraseña...">
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="password">Confirmar contraseña</label>
                            <input type="password" name="txtConfirmarContrasena" id="contrasenaConfirmar" class="form-control" placeholder="Confirme su nueva contraseña...">
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                            <input id="agregar" type="submit" class="btn btn-success" value="Cambiar contraseña" disabled>
                        </div>
                    </form>
                </div>
                <?php include("modal/agregarCargo.php");?>
            </div>
        </div>
        <?php include 'modal/eliminarCargo.php'?>
    </div>
</div>


<?php include("modal/editarCargo.php");?>
<?php include 'partials/footer.php'; ?>
