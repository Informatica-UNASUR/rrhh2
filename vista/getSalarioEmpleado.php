<?php
include '../controlador/EmpleadoControlador.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $resultado = EmpleadoControlador::mostrarSalarios();
    $json = array();
    do {
        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $json["data"][] = $row;
        }
    } while (next($resultado));
    echo json_encode($json);
//    sqlsrv_free_stmt( $resultado);
} elseif ($_SERVER["REQUEST_METHOD"] == "GET"){
    $idEmpleado = $_GET["txtIdUsuario"];
    $salario = str_replace('.', '', $_GET["txtSalario"]);
    $resultado = EmpleadoControlador::actualizarSalario($idEmpleado, $salario);
    $json = array();

    do {
        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
//            $json["data"][] = $row;
            $json = $row;
        }
    } while (next($resultado));

    echo json_encode($json);

//    sqlsrv_free_stmt( $resultado);
} else {
    header("location:index.php");
}