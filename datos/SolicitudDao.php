<?php
include 'Conexion.php';
include '../entidades/Solicitud.php';

class SolicitudDao extends Conexion {
    protected static $conexion;

    private static function getConexion() {
        return self::$conexion = Conexion::conectar();
    }

    private static function desconectar() {
        self::$conexion = null;
    }

    public static function registrarSolicitud($solicitud) {
        $motivo     = $solicitud->getMotivo();
        $fechaDesde = $solicitud->getFechaDesde();
        $fechaHasta = $solicitud->getFechaHasta();
        $horaDesde  = $solicitud->getHoraDesde();
        $horaHasta  = $solicitud->getHoraHasta();
        $idEmpleado = $solicitud->getEmpleadoIdEmpleado();

        $query = "INSERT INTO solicitud(motivo, fechaDesde, fechaHasta, horaDesde, horaHasta, Empleado_idEmpleado) 
                  VALUES ('$motivo', '$fechaDesde', '$fechaHasta', '$horaDesde', '$horaHasta', '$idEmpleado')";

        $resultado = self::getConexion()->prepare($query);
        $resultado->execute();

        if($resultado) {
            return true;
        }
        return false;
    }

    public static function mostrarHistoricoSolicitudes($idEmpleado) {
        $query = "SELECT motivo, fechaDesde, fechaHasta, horaDesde, horaHasta
                  FROM `solicitud` WHERE Empleado_idEmpleado = :id";

        $resultado = self::getConexion()->prepare($query);
        $resultado->bindValue(":id", $idEmpleado);

        $resultado->execute();

        if($resultado) {
            return $resultado;
        }
        return false;
    }
}