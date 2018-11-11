<?php include 'partials/head.php'; ?>
<?php
include '../controlador/DepartamentoControlador.php';

if (isset($_SESSION["usuario"])) {

} else {
    header("location:index.php");
}
?>
<?php include 'partials/menu.php'; ?>

<div class="container listado">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    LISTADO DE DEPARTAMENTOS
                    <a href="#agregarDepartamentoModal" class="btn btn-sm btn-outline-dark float-right" data-toggle="modal">Agregar departamento</a>
                </div>
                <div class="card-body">
                    <table id="dtDepartamento" class="table table-sm table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Nombre del departamento</th>
                            <th class="text-center">Acción</th>
                        </tr>
                        </thead>

                    </table>
                </div>
                <?php include("modal/agregarDepartamentos.php");?>
            </div>
        </div>
        <?php include 'modal/eliminarDepartamentos.php'?>
    </div>
</div>


<?php include("modal/editarDepartamentos.php");?>
<?php include 'partials/footer.php'; ?>
