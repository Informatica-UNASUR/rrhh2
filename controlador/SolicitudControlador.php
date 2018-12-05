<?php
include '../datos/SolicitudDao.php';

class SolicitudControlador {

    public static function registrarSolicitud($motivo, $fechaDesde, $fechaHasta, $horaDesde, $horaHasta, $idEmpleado) {
        $obj_solicitud = new Solicitud();
        $obj_solicitud->setMotivo($motivo);
        $obj_solicitud->setFechaDesde($fechaDesde);
        $obj_solicitud->setFechaHasta($fechaHasta);
        $obj_solicitud->setHoraDesde($horaDesde);
        $obj_solicitud->setHoraHasta($horaHasta);
        $obj_solicitud->setEmpleadoIdEmpleado($idEmpleado);

        return SolicitudDao::registrarSolicitud($obj_solicitud);
    }

    public static function mostrarHistoricoSolicitudes($idEmpleado) {
        return SolicitudDao::mostrarHistoricoSolicitudes($idEmpleado);
    }
}
