<?php
include '../controlador/DeduccionControlador.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $resultado = DeduccionControlador::mostrarDeducciones();
    while (($fila = $resultado->fetch(PDO::FETCH_ASSOC)) != NULL) {
        echo '<option value="' . $fila['idTipoDeduccion'] . '">' . $fila['tipoDeduccion'] . '</option>';
    }
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $idEmpleado = $_GET["idEmpleado"];
    $resultado = DeduccionControlador::mostrarDeduccionesP($idEmpleado);

    $json = array();

    do {
        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $json["data"][] = $row;
        }
    } while (next($resultado));

    echo json_encode($json);

    //sqlsrv_free_stmt( $resultado);
} else {
    header("location:index.php");
}
