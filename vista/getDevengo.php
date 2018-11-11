<?php
include '../controlador/DevengoControlador.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $resultado = DevengoControlador::mostrarDevengos();
        while (($fila = $resultado->fetch(PDO::FETCH_ASSOC)) != NULL) {
            echo '<option value="' . $fila['idTipoDevengo'] . '">' . $fila['TipoDevengo'] . '</option>';
        }
} else {
    header("location:index.php");
}
