<?php include 'partials/head.php'; ?>
<?php
include '../controlador/UsuarioControlador.php';

if (isset($_SESSION["usuario"])) {
    if($_SESSION["usuario"]["Rol_idRol"] == 2) { // Si el rol del user es 2, redirige al index
        header("location:index.php");
    }
} else {
    header("location:index.php");
}
?>
<?php include 'partials/menu.php'; ?>

<div class="container" style="max-height: 100%">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    LISTADO DE ROLES
<!--                    <a href="#agregarRolModal" class="btn btn-sm btn-outline-dark float-right" data-toggle="modal">Agregar roles</a>-->
                </div>

                <div class="card-body">
                    <table id="dtRol" class="table table-sm table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Nombre del rol</th>
                            <th>Descripción</th>
<!--                            <th>Acción</th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $data = UsuarioControlador::mostrarRoles();

                        foreach ($data as $row) {
                            $idRol = $row['idRol'];
                            $nombre = $row['nombre'];
                            $descripcion = $row['descripcion'];
                            ?>
                            <tr>
                                <td>&nbsp;&nbsp;<?php echo $idRol; ?></td>
                                <td><?php echo $nombre; ?></td>
                                <td><?php echo $descripcion; ?></td>
<!--                                <td>-->
<!--                                    <a href="#" data-toggle="modal" data-target="#editarRolModal"-->
<!--                                       data-id="--><?php //echo $idRol ?><!--"-->
<!--                                       data-name="--><?php //echo $nombre ?><!--"-->
<!--                                       data-desc="--><?php //echo $descripcion ?><!--">-->
<!--                                        <i class="material-icons" data-toggle="tooltip" title="Editar" style="color: #FFC107;">edit</i>-->
<!--                                    </a>-->
<!--                                    <a href="#">-->
<!--                                        <i class="material-icons" data-toggle="tooltip" title="Eliminar" style="color: #F44336;">delete</i>-->
<!--                                    </a>-->
<!---->
<!--                                </td>-->
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php //include 'modal/agregarRol.php'?>
<?php include 'modal/editarRol.php'?>
<?php include 'partials/footer.php'; ?>
