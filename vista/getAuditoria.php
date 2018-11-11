<?php
include '../controlador/AuditoriaControlador.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
$resultado = AuditoriaControlador::mostrarAuditoria();

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
