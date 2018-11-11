<?php
include '../datos/DeduccionDao.php';

class DeduccionControlador {

    public static function registrarDeduccion($nombreDeduccion) {
        $obj_Deduccion = new Deduccion();
        $obj_Deduccion->setTipoDeduccion($nombreDeduccion);
        return DeduccionDao::registrarDeduccion($obj_Deduccion);
    }

    public static function registrarDevengo($nombreDevengo) {
        $obj_Deduccion = new Devengo();
        $obj_Deduccion->setTipoDevengo($nombreDevengo);
        return DevengoDao::registrarDeduccion($obj_Deduccion);
    }

    public static function agregarDeduccion($idEmpleado, $idTipoDeduccion, $montoDeduccion, $fechaDeduccion, $obsDeduccion) {
        $obj_Deduccion = new Deduccion();
        $obj_Deduccion->setEmpleadoIdEmpleado($idEmpleado);
        $obj_Deduccion->setTipoDeduccionIdDeduccion($idTipoDeduccion);
        $obj_Deduccion->setMontoDeduccion($montoDeduccion);
        $obj_Deduccion->setFechaDeduccion($fechaDeduccion);
        $obj_Deduccion->setObservacion($obsDeduccion);
        return DeduccionDao::agregarDeduccion($obj_Deduccion);
    }

    // Mostrar departamentos
    public static function mostrarDeducciones() {
        return DeduccionDao::mostrarDeducciones();
    }

    public static function mostrarDeduccionesP($idEmpleado) {
        return DeduccionDao::mostrarDeduccionesP($idEmpleado);
    }

    public static function eliminarCargo($idCargo) {
        return CargoDao::eliminarCargo($idCargo);
    }
}
