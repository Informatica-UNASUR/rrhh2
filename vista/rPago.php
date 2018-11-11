<?php include 'partials/head.php'; ?>
<?php
include '../controlador/DepartamentoControlador.php';

if (isset($_SESSION["usuario"])) {

} else {
    header("location:index.php");
}
?>
<?php include 'partials/menu.php'; ?>

<div class="container" style="max-height: 100%">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    REPORTE DE LIQUIDACIONES
                </div>
                <div class="card-body">
                    <form action="reporte_salarios.php" method="POST">
                        <div class="form-group row mb-2">
                            <label class="col-sm-1 col-form-label text-right">Dpto</label>
                            <div class="col-sm-3">
                                <select name="cbDepto" id="idDpto" class="custom-select cbDepto">
                                    <option value="" selected disabled>--Selecciona el departamento--</option>
                                    <?php
                                    $r = DepartamentoControlador::mostrarDptos();
                                    while(($fila = $r->fetch(PDO::FETCH_ASSOC)) != NULL) {
                                        echo '<option value="'.$fila['idDepartamento'].'">'.$fila['nombreDepartamento'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <label class="col-sm-1 col-form-label">Empleado</label>
                            <div class="col-sm-3">
                                <select name="cbEmpleado" id="idEmpleado" class="custom-select cbEmpleado" disabled required>
                                    <option value="" selected disabled>--Selecciona el empleado--</option>
                                </select>
                            </div>
                            <label class="col-sm-1 col-form-label">Periodo</label>
                            <div class="col-sm-2">
                                <input name="periodo" id="periodoPago" type="month" class="form-control" disabled required>
                            </div>
                            <input type="submit" class="btn btn-success" value="PDF">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>
