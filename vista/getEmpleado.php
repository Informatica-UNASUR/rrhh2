<?php
include '../controlador/EmpleadoControlador.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['idDpto'])) {
        $idDpto = $_POST['idDpto'];
        $resultado = EmpleadoControlador::obtenerEmpleado($idDpto);

        while(($fila = $resultado->fetch(PDO::FETCH_ASSOC)) != NULL) {
            echo '<option value="'.$fila['idEmpleado'].'">'.$fila['nombre'].' '.$fila['apellido'].'</option>';
        }
    } else {
        $resultado = EmpleadoControlador::mostrarEmpleados();

        $json = array();

        do {
            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $json["data"][] = $row;
            }
        } while (next($resultado));

        echo json_encode($json);

        //sqlsrv_free_stmt($resultado);
    }
} else {
    header("location:index.php");
}
