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
                    LIQUIDACION DE SALARIOS
                </div>
                <div class="card-body">
                    <form id="cabeceraLiquidarSalario">
                    <div class="form-group row mb-2">
                        <label class="col-sm-3 col-form-label text-right">Fecha inicio del periodo a liquidar</label>
                        <div class="col-sm-3">
                            <input type="text" name="txtPeriodoSalario" id="periodoSalario" class="form-control" required placeholder="--Seleccione el periodo--">
                        </div>
                        <div class="col-sm-1">
                            <button id="liquidar" type="submit" class="btn btn-outline-dark"><i class="fa fa-arrow-ticket">&nbsp;LIQUIDAR</i></button>
                        </div>
                        <div class="col-sm-1">
                            <button id="realizar_pago" type="submit" class="btn btn-outline-dark"><i class="fa fa-arrow-ticket">&nbsp;REALIZAR PAGO</i></button>
                        </div>
                    </div>
                    </form>
<!--                    &nbsp;<hr>-->
                    <div id="cardPago" class="card-body"> <!-- hidden -->
                        <div class="form-group-sm row">
                            <div class="col-sm-12">
                                <div id="cardHistoricoPagos" class="card">
                                    <div id="cheader" class="card-header" style="background-color: white">
                                        HISTORICO DE PAGOS
                                        <a id="pdfHistoricoPago" class="btn float-right border-0"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <table id="dtLiquidarSalario" class="table table-sm table-hover" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>Funcionario</th>
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
