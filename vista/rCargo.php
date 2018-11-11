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
                    REPORTE DE EMPLEADOS ACTIVOS POR CARGOS Y DEPARTAMENTOS
                </div>
                <div class="card-body">
                    <form action="reporte_cargos.php" method="POST">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Departamento</label>
                            <div class="col-sm-3">
                                <select name="idDepartamento" id="idDpto" class="custom-select cbDepto">
                                    <option value="0" selected>--Todos--</option>
                                    <?php
                                    $r = DepartamentoControlador::mostrarDptos();
                                    while(($fila = $r->fetch(PDO::FETCH_ASSOC)) != NULL) {
                                        echo '<option value="'.$fila['idDepartamento'].'">'.$fila['nombreDepartamento'].'</option>';
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="col-sm-3">
                                <input type="submit" class="btn btn-success" value="EXPORTAR A PDF">
                            </div>
                        </form>
                    </div>
                    &nbsp;<hr>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>
