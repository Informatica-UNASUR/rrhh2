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
                    PAGO DE SALARIOS
                </div>
                <div class="card-body">
                    <form id="cabecera">
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
                        <button id="selectData" type="submit" class="btn btn-outline-dark" disabled><i class="fa fa-search">&nbsp;VER</i></button>
                    </div>
                    </form>
<!--                    &nbsp;<hr>-->
                    <div id="cardPago" class="card-body" style="display: none"> <!-- hidden -->
                        <div class="form-group-sm row">
                            <div class="col-sm-3">
                                <div id="cardPagoDetalle" class="card">
                                    <div class="card-header" style="background-color: white">
                                        PAGO <span id="mesPago" class="badge badge-success" style="font-size: 85%"></span>
                                        <button class="btn btn-outline-secondary float-right border-0" disabled><i class="fa fa-calendar fa-lg" aria-hidden="true"></i></button>
                                    </div>
                                    <div class="card-body">
                                        <form id="formPagoDetalle">
                                            <div class="form-group col-sm-12 mb-1">
                                                <label>Salario</label>
                                                <input type="text" name="txtSalario" id="salario" class="form-control" disabled>
                                            </div>
                                            <div class="form-group col-sm-12 mb-sm-1">
                                                <label>Total descuentos</label>
                                                <input type="text" name="txtTotalDeduccion" id="totalDeduccion" class="form-control" disabled>
                                            </div>
                                            <div class="form-group col-sm-12 mb-sm-1">
                                                <label>Total asignaciones</label>
                                                <input type="text" name="txtTotalDevengo" id="totalDevengo" class="form-control" disabled>
                                            </div>
                                            <div class="form-group col-sm-12 mb-sm-1">
                                                <label for="rol">Monto a pagar</label>
                                                <input type="text" name="txtTotalPagar" id="totalPagar" class="form-control" disabled>
                                            </div>
                                            <div class="form-group col-sm-12 mb-sm-1">
                                                <label for="rol">Fecha de pago</label>
                                                <input name="fechaPago" id="fechaPago" type="date" class="form-control" required>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <input id="agregar" type="submit" class="btn btn-sm btn-outline-success float-right" value="Guardar">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div id="cardHistoricoPagos" class="card">
                                    <div id="cheader" class="card-header" style="background-color: white">
                                        HISTORICO DE PAGOS
                                        <a id="pdfHistoricoPago" class="btn float-right border-0"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <table id="dtHistoricoPago" class="table table-sm table-hover" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>Periodo</th>
                                                    <th>Fecha pago</th>
                                                    <th>Salario</th>
                                                    <th>Descuentos</th>
                                                    <th>Asignaciones</th>
                                                    <th>Total percibido</th>
                                                    <th class="text-center">Detalles</th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>
