<?php
include '../controlador/DepartamentoControlador.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
$resultado = DepartamentoControlador::mostrarDepartamentos();

$json = array();

do {
    while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $json["data"][] = $row;
    }
} while (next($resultado));

echo json_encode($json);

    //$resultado->free();

} else {
    header("location:index.php");
}
