<?php include 'partials/head.php'; ?>
<?php
include '../controlador/EmpleadoControlador.php';

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
                <div id="cheader" class="card-header">
                    LISTADO DE EMPLEADOS
                    <a href="#agregarEmpleadoModal" class="btn btn-sm btn-outline-dark float-right" data-toggle="modal">Agregar empleado</a>
                    <a href="exportarListadoEmpleados.php" class="btn btn-sm btn-outline-success float-right" data-toggle="tooltip" data-placement="left" title="Exportar listado de empleados a excel" download>
                        <i class="fa fa-file-excel-o fa-lg" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="card-body">
                    <table id="dtEmpleado" class="table table-sm table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>CI</th>
                            <th>Funcionario</th>
                            <th>Departamento</th>
                            <th>Cargo</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acción</th>
                        </tr>
                        </thead>

                    </table>
                </div>
                <?php include("modal/agregarEmpleado.php");?>
            </div>
        </div>
        <?php include 'modal/eliminarEmpleados.php'?>
    </div>
</div>


<?php include("modal/editarEmpleados.php");?>
<?php include 'partials/footer.php'; ?>
