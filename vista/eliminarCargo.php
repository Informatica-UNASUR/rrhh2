<?php
include '../controlador/CargoControlador.php';

//header('Content-type:application/json;charset=utf-8');
//$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["txtNombreCargo"]) && isset($_POST["txtIdCargo"])){

        $idCargo = $_POST["txtIdCargo"];

//        $resultado = array("valor" => "true");

        if(CargoControlador::eliminarCargo($idCargo)) {
//            return print(json_encode($resultado));
            header("location:cargo.php");
        } else {
        	header("location:index.php");
        }
    }
} else {
    header("location:index.php");
}

//$resultado = array("valor" => "false");
//return print(json_encode($resultado));