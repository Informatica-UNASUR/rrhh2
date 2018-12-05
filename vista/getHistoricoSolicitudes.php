<?php
include '../controlador/SolicitudControlador.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
$idEmpleado = $_POST['idEmpleado'];
$resultado = SolicitudControlador::mostrarHistoricoSolicitudes($idEmpleado);

$json = array();
$flag = false;

do {
    while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $json["data"][] = $row;
        $flag = true;
    }
} while (next($resultado));

if ($flag === false) {
    echo json_encode('no data');
} else {
    echo json_encode($json);
}

//sqlsrv_free_stmt( $resultado);
} else {
    header("location:index.php");
}
