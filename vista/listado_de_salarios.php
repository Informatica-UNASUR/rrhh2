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
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-7">
                            <div class="card">
                                <div id="cheader" class="card-header" style="background-color: white">
                                    LISTADO DE SALARIOS
                                    <a href="exportarListadoSalarios.php" class="btn btn-sm btn-outline-success float-right" data-toggle="tooltip" data-placement="left" title="Exportar listado de salarios a excel" download>
                                        <i class="fa fa-file-excel-o fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <table id="dtSalario" class="table table-sm table-hover" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>CI</th>
                                            <th>Funcionario</th>
                                            <th>Salario bruto</th>
                                            <th class="text-center">Acción</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- Fin dtSalario -->
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-header" style="background-color: white">
                                    ACTUALIZAR SALARIO
                                    <button class="btn btn-outline-secondary float-right border-0" disabled><i class="fa fa-align-justify fa-lg" aria-hidden="true"></i></button>
                                </div>
                                <div class="card-body">
                                    <form id="actualizarSalario">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Empleado</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="txtNombre"  id="edit_name" class="form-control" disabled>
                                                <input type="hidden" name="txtIdUsuario" id="edit_id" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Salario</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="txtSalario"  id="edit_salario" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="card-footer" style="background-color: white">
                                            <button type="submit" id="upSalario" class="btn btn-sm btn-outline-success float-right mb-0">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
                <!--                --><?php //include("modal/agregarEmpleado.php");?>
            </div>
        </div>
        <?php include 'modal/eliminarEmpleados.php'?>
    </div>
</div>


<?php include("modal/editarEmpleados.php");?>
<?php include 'partials/footer.php'; ?>
