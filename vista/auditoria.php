<?php include 'partials/head.php'; ?>
<?php
include '../controlador/AuditoriaControlador.php';

if (isset($_SESSION["usuario"])) {
    if($_SESSION["usuario"]["Rol_idRol"] == 2) { // Si el rol del user es 2(rol usuario), redirige al index
        header("location:index.php");
    }
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
                    AUDITORIA
                </div>

                <div class="card-body">
                    <table id="dtAuditoria" class="table table-sm table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>Fecha/Hora</th>
                            <th>Usuario</th>
                            <th>Accion</th>
                            <th>Tabla</th>
                            <th>Columna</th>
                            <th>Nuevo Valor</th>
                            <th>Antiguo Valor</th>
                        </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>
