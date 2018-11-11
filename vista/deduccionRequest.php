<?php
include '../controlador/DeduccionControlador.php';

$opcion = $_POST["opcion"];
if($opcion == 'registrarDeduccion') {
    $nombreDeduccion = $_POST["txtNombreDeduccion"];
    $resultado = DeduccionControlador::registrarDeduccion($nombreDeduccion);
    verificar_resultado($resultado);
} else if($opcion == 'agregarDeduccion') {
    $idEmpleado = $_POST["idEmpleado"];
    $tipoDeduccion = $_POST["cbDeduccion"];
    $montoDeduccion = str_replace('.', '', $_POST["montoDeduccion"]);
    $fechaDeduccion = $_POST["fechaDeduccion"];
    $obsDeduccion = $_POST["obsDeduccion"];

    $resultado = DeduccionControlador::agregarDeduccion($idEmpleado, $tipoDeduccion, $montoDeduccion, $fechaDeduccion, $obsDeduccion);
    verificar_resultado($resultado);
}

function verificar_resultado($resultado) {
    if(!$resultado) $informacion["respuesta"] = "ERROR";
    else $informacion["respuesta"] = "BIEN";
    echo json_encode($informacion);
}
