<?php
include '../controlador/NominaControlador.php';

$periodo = $_POST["txtPeriodoSalario"];

$resultado = NominaControlador::liquidarSalario($periodo);
verificar_resultado($resultado);

function verificar_resultado($resultado) {
    if(!$resultado) $informacion["respuesta"] = "ERROR";
    else $informacion["respuesta"] = "BIEN";
    echo json_encode($informacion);
}
