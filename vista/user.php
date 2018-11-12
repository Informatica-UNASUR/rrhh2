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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    LISTADO DE USUARIOS
                    <a href="#agregarUsuarioModal" class="btn btn-sm btn-outline-dark float-right" data-toggle="modal">Agregar usuario</a>
                </div>
                <div class="card-body">
                    <table id="dtDefault" class="table table-sm table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Nombre del usuario</th>
                            <th>Fecha de alta</th>
                            <th>Rol</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $data = UsuarioControlador::mostrarUsuarios();

                        foreach ($data as $row) {
                            $idUsuario = $row['idUsuario'];
                            $nombre    = $row['usuario'];
                            $fechaAlta = $row['fechaAlta'];
                            $estado    = $row['estado'];
                            $rol       = $row['Rol_idRol'];
                            $nombreRol = $row['nombre'];
                            $estado == 1 ? $activo = true : $activo = false;
                            ?>
                            <tr>
                                <td>&nbsp;&nbsp;<?php echo $idUsuario; ?></td>
                                <td><?php echo $nombre; ?></td>
                                <td><?php echo $fechaAlta; ?></td>
                                <td><?php echo $nombreRol; ?></td>
                                <?php if($estado) {?>
                                    <td class="text-center"><span class="badge badge-success"><?php echo "Activo"; ?></span></td>
                                <?php } else {?>
                                    <td class="text-center"><span class="badge badge-secondary"><?php echo "Inactivo"; ?></span></td>
                                <?php }?>
                                <td class="text-center">
                                    <a href="#" data-toggle="modal" data-target="#editarUsuarioModal"
                                       data-id="<?php echo $idUsuario ?>"
                                       data-name="<?php echo $nombre ?>"
                                       data-fecha="<?php echo $fechaAlta ?>"
                                       data-rol="<?php echo $rol ?>"
                                       data-estado="<?php echo $estado ?>">
                                        <i class="material-icons" data-toggle="tooltip" id="edit" title="Editar">edit</i>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#eliminarUsuarioModal"
                                       data-id="<?php echo $idUsuario ?>"
                                       data-name="<?php echo $nombre ?>">
                                        <i class="material-icons" data-toggle="tooltip" id="delete" title="Eliminar">delete</i>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#editarContrasenaModal"
                                       data-id="<?php echo $idUsuario ?>"
                                       data-name="<?php echo $nombre ?>">
                                        <i class="material-icons" data-toggle="tooltip" id="delete" title="Cambiar contraseña">lock_open</i>
                                    </a>

                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php include("modal/agregarUsuario.php");?>
            </div>
        </div>
        <?php include 'modal/eliminarUsuario.php'?>
    </div>
    <?php include 'modal/editarContrasena.php'?>
</div>


<?php include("modal/editarUsuario.php");?>
<?php include 'partials/footer.php'; ?>
