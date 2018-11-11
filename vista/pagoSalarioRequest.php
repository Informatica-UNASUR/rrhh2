<?php
include '../controlador/NominaControlador.php';

$idEmpleado = $_POST["idEmpleado"];
$diasTrabajados = 26;
$fechaPago = $_POST["fechaPago"];
$periodo = $_POST["periodo"];
$periodoPago = $periodo.'-01';
//$totalPagar = $_POST["txtTotalPagar"];
//$totalDeduccion = $_POST["txtTotalDeduccion"];
//$totalDevengo = $_POST["txtTotalDevengo"];
$salario = str_replace('.', '', $_POST["txtSalario"]);
$totalPagar = str_replace('.', '', $_POST["txtTotalPagar"]);
$totalDeduccion = str_replace('.', '', $_POST["txtTotalDeduccion"]);
$totalDevengo = str_replace('.', '', $_POST["txtTotalDevengo"]);

$resultado = NominaControlador::registrarNomina($idEmpleado, $diasTrabajados, $fechaPago, $periodoPago, $salario, $totalPagar, $totalDeduccion, $totalDevengo);
verificar_resultado($resultado);

function verificar_resultado($resultado) {
    if(!$resultado) $informacion["respuesta"] = "ERROR";
    else $informacion["respuesta"] = "BIEN";
    echo json_encode($informacion);
}
