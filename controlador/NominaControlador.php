<?php
include '../datos/NominaDao.php';

class NominaControlador {

    public static function registrarNomina($idEmpleado, $dias, $fecha, $periodo, $salario, $totalPercibido, $totalDeduccion, $totalDevengo) {
        $obj_Nomina = new Nomina();
        $obj_Nomina->setEmpleadoIdEmpleado($idEmpleado);
        $obj_Nomina->setDiasTrabajados($dias);
        $obj_Nomina->setFechaPago($fecha);
        $obj_Nomina->setPeriodoPago($periodo);
        $obj_Nomina->setSalario($salario);
        $obj_Nomina->setTotalPago($totalPercibido);
        $obj_Nomina->setTotalDeduccion($totalDeduccion);
        $obj_Nomina->setTotalDevengo($totalDevengo);
        return NominaDao::registrarNomina($obj_Nomina);
    }

    public static function mostrarNomina($idEmpleado, $periodo) {
        $obj_Nomina = new Nomina();
        $obj_Nomina->setEmpleadoIdEmpleado($idEmpleado);
        $obj_Nomina->setPeriodoPago($periodo);
        return NominaDao::mostrarNomina($obj_Nomina);
    }

    public static function reporteSalario($idEmpleado, $periodo) {
        $obj_Nomina = new Nomina();
        $obj_Nomina->setEmpleadoIdEmpleado($idEmpleado);
        $obj_Nomina->setPeriodoPago($periodo);
        return NominaDao::reporteSalario($obj_Nomina);
    }

    public static function reporteDeduccion($idEmpleado, $periodo) {
        $obj_Nomina = new Nomina();
        $obj_Nomina->setEmpleadoIdEmpleado($idEmpleado);
        $obj_Nomina->setPeriodoPago($periodo);
        return NominaDao::reporteDeduccion($obj_Nomina);
    }

    public static function reporteDevengo($idEmpleado, $periodo) {
        $obj_Nomina = new Nomina();
        $obj_Nomina->setEmpleadoIdEmpleado($idEmpleado);
        $obj_Nomina->setPeriodoPago($periodo);
        return NominaDao::reporteDevengo($obj_Nomina);
    }

    public static function mostrarHistoricoPagos($idEmpleado) {
        $obj_Nomina = new Nomina();
        $obj_Nomina->setEmpleadoIdEmpleado($idEmpleado);
        return NominaDao::mostrarHistoricoPagos($obj_Nomina);
    }

    public static function mostrarSalario($idEmpleado) {
        $obj_Nomina = new Nomina();
        $obj_Nomina->setEmpleadoIdEmpleado($idEmpleado);
        return NominaDao::mostrarSalario($obj_Nomina);
    }
}
