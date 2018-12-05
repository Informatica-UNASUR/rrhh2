<?php
include '../controlador/SolicitudControlador.php';

$motivo     = $_POST["txtMotivo"];
$fechaDesde = $_POST["txtFechaDesde"];
$fechaHasta = $_POST["txtFechaHasta"];
$horaDesde  = $_POST["txtHoraDesde"];
$horaHasta  = $_POST["txtHoraHasta"];
$idEmpleado = $_POST["idEmpleado"];

$resultado = SolicitudControlador::registrarSolicitud($motivo, $fechaDesde, $fechaHasta, $horaDesde, $horaHasta, $idEmpleado);
verificar_resultado($resultado);

function verificar_resultado($resultado) {
    if(!$resultado) $informacion["respuesta"] = "ERROR";
    else $informacion["respuesta"] = "BIEN";
    echo json_encode($informacion);
}