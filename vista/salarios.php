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
                    ADMINISTRAR SALARIOS
                </div>
                <div class="card-body">
                    <div class="form-group row"><!-- style="padding-top: 1%" -->
                        <label class="col-sm-2 col-form-label text-right">Departamento</label>
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
                            <select name="cbEmpleado" id="idEmpleado" class="custom-select cbEmpleado" disabled>
                                <option value="" selected disabled>--Selecciona el empleado--</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
<!--                            <input id="filtrarEmpleado" type="submit" class="btn btn-outline-dark col-lg-8" value="Filtrar" disabled>-->
                        </div>
                    </div>
                    &nbsp;<hr>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header" style="background-color: white">
                                    ASIGNACIONES
                                    <button id="idNewDevengo" class="btn btn-sm btn-outline-dark float-right mb-0" disabled>Agregar</button>
                                    <button href="#detalleDevengoModal" id="listarDevengo" class="btn btn-sm btn-outline-dark float-right" data-toggle="modal" disabled>Listar devengos</button>
                                </div>
                                <div class="card-body">
                                    <form id="agregarDevengo">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label text-right">Tipo:</label>
                                            <div class="col-sm-5">
                                                <select name="cbDevengo" id="devengo" class="custom-select" disabled required>
                                                    <option value="" selected disabled>--Selecciona--</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-0">
                                                <a href="#agregarDevengoModal" id="aggDevengo" class="btn btn-outline-dark float-none" data-toggle="modal"><i class="fa fa-plus-circle fa-lg" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Agregar nuevo tipo de asignación"></i></a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 text-right">Monto:</label>
                                            <div class="col-sm-5">
                                                <input type="number" id="montoDevengo" name="montoDevengo" class="form-control" disabled required>
                                                <input type="hidden" id="opcion" name="opcion" value="agregarDevengo">
                                            </div>
                                            <label class="col-sm-0 text-right">Fecha:</label>
                                            <div class="col-sm-4">
                                                <input type="text" id="fechaDevengo" name="fechaDevengo" class="form-control" disabled required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 text-right">Obs:</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="obsDevengo" name="obsDevengo" class="form-control" disabled required>
                                            </div>
                                        </div>
                                        <input id="addDevengo" type="submit" class="btn btn-sm btn-outline-dark float-right" value="Guardar" disabled>
                                    </form>
                                    <input id="CancelAddDevengo" type="submit" class="btn btn-sm btn-outline-dark float-right" value="Cancelar" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header" style="background-color: white">
                                    DESCUENTOS
                                    <input id="idNewDeduccion" type="submit" class="btn btn-sm btn-outline-dark float-right" value="Agregar" disabled>
                                    <button href="#detalleDeduccionModal" id="listarDeduccion" class="btn btn-sm btn-outline-dark float-right" data-toggle="modal" disabled>Listar deducciones</button>
                                </div>
                                <div class="card-body">
                                    <form id="agregarDeduccion">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label text-right">Tipo:</label>
                                            <div class="col-sm-5">
                                                <select name="cbDeduccion" id="deduccion" class="custom-select" disabled required>
                                                    <option value="" selected disabled>--Selecciona--</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-0">
                                                <a href="#agregarDeduccionModal" class="btn btn-outline-dark float-none" data-toggle="modal"><i class="fa fa-plus-circle fa-lg" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Agregar nuevo tipo de descuento"></i></a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 text-right">Monto:</label>
                                            <div class="col-sm-5">
                                                <input type="number" id="montoDeduccion" name="montoDeduccion" class="form-control" disabled required>
                                                <input type="hidden" id="opcion" name="opcion" value="agregarDeduccion">
                                            </div>
                                            <label class="col-sm-0 text-right">Fecha:</label>
                                            <div class="col-sm-4">
                                                <input type="text" id="fechaDeduccion" name="fechaDeduccion" class="form-control" disabled required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 text-right">Obs:</label>
                                            <div class="col-sm-10">
                                                <input id="obsDeduccion" type="text" name="obsDeduccion" class="form-control" disabled required>
                                            </div>
                                        </div>
                                        <input id="addDeduccion" type="submit" class="btn btn-sm btn-outline-dark float-right" value="Guardar" disabled>
                                    </form>
                                    <input id="CancelAddDeduccion" type="submit" class="btn btn-sm btn-outline-dark float-right" value="Cancelar" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("modal/agregarDevengo.php");?>
</div>
<?php include("modal/agregarDeduccion.php");?>
<?php include 'partials/footer.php'; ?>
