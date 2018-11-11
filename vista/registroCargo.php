<?php
include '../controlador/CargoControlador.php';
include '../helps/helps.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["txtNombreCargo"])){

        $txtNombreCargo = validar_campo($_POST["txtNombreCargo"]);

        if(CargoControlador::registrarCargo($txtNombreCargo)) {
            header("location:cargo.php");
        }
    }
} else {
    header("location:index.php");
}



