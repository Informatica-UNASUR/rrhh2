<?php
include '../datos/CargoDao.php';

class CargoControlador {

    public static function registrarCargo($nombreCargo) {
        $obj_Cargo = new Cargo();
        $obj_Cargo->setNombreCargo($nombreCargo);
        return CargoDao::registrarCargo($obj_Cargo);
    }

    public static function editarCargo($idCargo, $nombreCargo) {
        $obj_Cargo = new Cargo();
        $obj_Cargo->setIdCargo($idCargo);
        $obj_Cargo->setNombreCargo($nombreCargo);
        return CargoDao::editarCargo($obj_Cargo);
    }

    // Mostrar departamentos
    public static function mostrarCargos() {
        return CargoDao::mostrarCargos();
    }

    public static function eliminarCargo($idCargo) {
        return CargoDao::eliminarCargo($idCargo);
    }
}
