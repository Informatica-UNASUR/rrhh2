<?php
include '../controlador/NominaControlador.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $idEmpleado = $_POST["cbEmpleado"];
    $periodo = $_POST["periodo"];
    $periodo = $periodo.'-01';
    $resultado = NominaControlador::mostrarNomina($idEmpleado, $periodo);
    $json = array();

    do {
        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
//            $json["data"][] = $row;
            $json = $row;
        }
    } while (next($resultado));

    echo json_encode($json);

    //sqlsrv_free_stmt( $resultado);
} elseif ($_SERVER["REQUEST_METHOD"] == "GET"){
    $idEmpleado = $_GET["idEmpleado"];
    $resultado = NominaControlador::mostrarSalario($idEmpleado);
    $json = array();

    do {
        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $json = $row;
        }
    } while (next($resultado));

    echo json_encode($json);

    //sqlsrv_free_stmt( $resultado);
} else {
    header("location:index.php");
}