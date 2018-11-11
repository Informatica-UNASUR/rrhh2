<?php
include '../datos/AuditoriaDao.php';

class AuditoriaControlador {
    public static function mostrarAuditoria() {
        return AuditoriaDao::mostrarAuditoria();
    }

    public static function mostrarUsuarios() {
        return AuditoriaDao::mostrarUsuarios();
    }

    public static function mostrarTablas() {
        return AuditoriaDao::mostrarTablas();
    }
}