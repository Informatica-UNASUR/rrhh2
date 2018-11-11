<?php
include '../controlador/CargoControlador.php';
include '../helps/helps.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["txtNombreCargo"])){

        $txtNombreCargo = validar_campo($_POST["txtNombreCargo"]);
        $txtIdCargo = $_POST["txtIdCargo"];

        if(CargoControlador::editarCargo($txtIdCargo, $txtNombreCargo)) { // Resulota
            header("location:cargo.php");
        }
    }
} else {
//    header("location:index.php?error=1");
    header("location:index.php");
}



