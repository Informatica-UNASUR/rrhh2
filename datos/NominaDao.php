<?php
include 'Conexion.php';
include '../entidades/Nomina.php';

class NominaDao extends Conexion {
    protected static $conexion;

    private static function getConexion() {
        return self::$conexion = Conexion::conectar();
    }

    private static function desconectar() {
        self::$conexion = null;
    }

    public static function liquidarSalario($periodo) {
        $query = "call sp_liquidar_salario(:periodo)";

        $resultado = self::getConexion()->prepare($query);
        $resultado->bindValue(":periodo", $periodo);

        $resultado->execute();

        if($resultado) {
            return $resultado;
        }
        //return false;
    }

    public static function registrarNomina($nomina) {
        $idEmpleado      = $nomina->getEmpleadoIdEmpleado();
        $dias            = $nomina->getDiasTrabajados();
        $fecha           = $nomina->getFechaPago();
        $periodo         = $nomina->getPeriodoPago();
        $salario         = $nomina->getSalario();
        $totalPercibido  = $nomina->getTotalPago();
        $totalDeduccion  = $nomina->getTotalDeduccion();
        $totalDevengo    = $nomina->getTotalDevengo();

        $query = "insert into rrhh.nominapago (Empleado_idEmpleado,diasTrabajados, fechaPago, periodoPago, totalDeduccion, totalDevengo, salario, totalPercibido ) values (
                  '$idEmpleado', '$dias', '$fecha', '$periodo','$totalDeduccion', '$totalDevengo','$salario', '$totalPercibido')";
        /*
        $query = "{call sp_registrar_nomina(?,?,?,?)}";
        $params = array(
            array($idEmpleado, SQLSRV_PARAM_IN),
            array($dias, SQLSRV_PARAM_IN),
            array($periodo, SQLSRV_PARAM_IN),
            array($totalPercibido, SQLSRV_PARAM_IN)
        );
        */

        //self::getConexion();

        $resultado = self::getConexion()->prepare($query);
        $resultado->execute();

        if($resultado) {
            return $resultado;
        }
        //return false;
    }

    public static function mostrarNomina($nomina) {
        $idEmpleado      = $nomina->getEmpleadoIdEmpleado();
        $periodo         = $nomina->getPeriodoPago();

        $query = "call sp_mostrar_nomina(:idEmpleado,:periodo)";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->bindValue(":idEmpleado", $idEmpleado);
        $resultado->bindValue(":periodo", $periodo);

        $resultado->execute();

        if($resultado) {
            return $resultado;
        }
        //return false;
    }

    public static function reporteSalario($nomina) {
        $idEmpleado      = $nomina->getEmpleadoIdEmpleado();
        $periodo         = $nomina->getPeriodoPago();

        $query = "call sp_reporte_salario(:idEmpleado,:periodo);";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);

        $resultado->bindValue(":idEmpleado", $idEmpleado);
        $resultado->bindValue(":periodo", $periodo);

        $resultado->execute();

        $empleado = array();
        do {
            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $empleado[] = $row;
            }
        } while (next($resultado));

        return $empleado;
    }

    public static function reporteDeduccion($nomina) {
        $idEmpleado      = $nomina->getEmpleadoIdEmpleado();
        $periodo         = $nomina->getPeriodoPago();

        $query = "call sp_reporte_deduccion(:idEmpleado,:periodo)";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->bindValue(":idEmpleado", $idEmpleado);
        $resultado->bindValue(":periodo", $periodo);

        $resultado->execute();

        $empleado = array();
        do {
            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $empleado[] = $row;
            }
        } while (next($resultado));

        return $empleado;
    }

    public static function reporteDevengo($nomina) {
        $idEmpleado      = $nomina->getEmpleadoIdEmpleado();
        $periodo         = $nomina->getPeriodoPago();

        $query = "call sp_reporte_devengo(:idEmpleado,:periodo);";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->bindValue(":idEmpleado", $idEmpleado);
        $resultado->bindValue(":periodo", $periodo);

        $resultado->execute();

        $empleado = array();
        do {
            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $empleado[] = $row;
            }
        } while (next($resultado));

        return $empleado;
    }

    public static function mostrarHistoricoPagos($nomina) {
        $idEmpleado = $nomina->getEmpleadoIdEmpleado();

        $query = "call sp_mostrar_historico_pago(:id);";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->bindValue(":id", $idEmpleado);

        $resultado->execute();

        if($resultado) {
            return $resultado;
        }
        //return false;
    }

    public static function mostrarSalario($empleado) {
        $idEmpleado      = $empleado->getEmpleadoIdEmpleado();

        $query = "select salarioFijo as Salario from rrhh.empleadocargo where Empleado_idEmpleado = $idEmpleado order by Empleado_idEmpleado desc";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        if($resultado) {
            return $resultado;
        }
        //return false;
    }
}