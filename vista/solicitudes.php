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
                    SOLICITUD DE PERMISO
                </div>
                <div class="card-body">
                    <form id="cabeceraSolicitud">
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
                            <button id="selectSolicitud" type="submit" class="btn btn-outline-dark" disabled><i class="fa fa-arrow-right">&nbsp;CONTINUAR</i></button>
                        </div>
                    </form>
                    <hr>
                    <!--                    &nbsp;<hr>-->
                    <div id="cardPago" class="card-body">
                        <div class="form-group-sm row">
                            <div class="col-sm-3">
                                <div id="cardSolicitudDetalle" class="card">
                                    <div class="card-header" style="background-color: white">
                                        DETALLES <span id="mesPago" class="badge badge-success" style="font-size: 85%"></span>
                                        <button class="btn btn-outline-secondary float-right border-0" disabled><i class="fa fa-calendar fa-lg" aria-hidden="true"></i></button>
                                    </div>
                                    <div class="card-body">
                                        <form id="formSolicitudDetalle">
                                            <div class="form-group col-sm-12 mb-1">
                                                <label>Motivo</label>
<!--                                                <input type="text" name="txtMotivo" id="motivo" class="form-control" disabled>-->
                                                <select class="custom-select" name="txtMotivo" id="motivo" required disabled>
                                                    <option value="" selected disabled>Seleccione el motivo</option>
                                                    <option value="Consulta médica">Consulta medica</option>
                                                    <option value="Vacaciones">Vacaciones</option>
                                                    <option value="Reposo">Reposo</option>
                                                    <option value="Gestión Particular">Gestion Particular</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 mb-sm-1">
                                                <label>Fecha desde</label>
                                                <input type="text" name="txtFechaDesde" id="fechaDesde" class="form-control" disabled required>
                                            </div>
                                            <div class="form-group col-sm-12 mb-sm-1">
                                                <label>Fecha hasta</label>
                                                <input type="text" name="txtFechaHasta" id="fechaHasta" class="form-control" disabled required>
                                            </div>
                                            <div class="form-group col-sm-12 mb-sm-1">
                                                <label for="rol">Hora desde</label>
                                                <input type="text" name="txtHoraDesde" id="horaDesde" class="form-control" data-dtp="dtp_NfxAG" disabled required>
                                            </div>
                                            <div class="form-group col-sm-12 mb-sm-1">
                                                <label for="rol">Hora hasta</label>
                                                <input type="text" name="txtHoraHasta" id="horaHasta" class="form-control" disabled required>
                                            </div>
                                            <hr>
                                            <input id="agregar" type="submit" class="btn btn-sm btn-outline-success float-right" value="Guardar" disabled>
                                        </form>
                                        <button id="CancelAddSolicitud" class="btn btn-sm btn-outline-dark float-right" disabled>Cancelar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div id="cardHistoricoPagos" class="card">
                                    <div id="cheader" class="card-header" style="background-color: white">
                                        HISTORICO DE SOLICITUDES
                                        <a id="pdfHistoricoPago" class="btn float-right border-0"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <table id="dtHistoricoSolicitudes" class="table table-sm table-hover" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>Motivo</th>
                                                    <th>Fecha Desde</th>
                                                    <th>Fecha Hasta</th>
                                                    <th>Hora Desde</th>
                                                    <th>Hora Hasta</th>
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
