<?php
include '../datos/DevengoDao.php';

class DevengoControlador {

    public static function registrarDevengo($nombreDevengo) {
        $obj_Devengo = new Devengo();
        $obj_Devengo->setTipoDevengo($nombreDevengo);
        return DevengoDao::registrarDevengo($obj_Devengo);
    }
//
//    public static function registrarDevengo($nombreDevengo) {
//        $obj_Deduccion = new Devengo();
//        $obj_Deduccion->setTipoDevengo($nombreDevengo);
//        return DevengoDao::registrarDeduccion($obj_Deduccion);
//    }

    public static function agregarDevengo($idEmpleado, $idTipoDevengo, $montoDevengo, $fechaDevengo, $obsDevengo) {
        $obj_Devengo = new Devengo();
        $obj_Devengo->setEmpleadoIdEmpleado($idEmpleado);
        $obj_Devengo->setTipoDevengoIdDevengo($idTipoDevengo);
        $obj_Devengo->setMontoDevengo($montoDevengo);
        $obj_Devengo->setFechaDevengo($fechaDevengo);
        $obj_Devengo->setObservacion($obsDevengo);
        return DevengoDao::agregarDevengo($obj_Devengo);
    }

    // Mostrar departamentos
    public static function mostrarDevengos() {
        return DevengoDao::mostrarDevengos();
    }

    public static function eliminarCargo($idCargo) {
        return CargoDao::eliminarCargo($idCargo);
    }

    public static function existe($nombre) {
        return DevengoDao::existe($nombre);
    }
}
