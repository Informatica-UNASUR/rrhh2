<?php
include '../datos/UsuarioDao.php';

class UsuarioControlador {

    public static function login($usuario, $password) {
        $obj_usuario = new Usuario();
        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setPassword($password);
        return UsuarioDao::login($obj_usuario);
    }

    public static function insertLogs($usuario) {
        return UsuarioDao::insertLogs($usuario);
    }

    public static function getUsuario($usuario, $password) {
        $obj_usuario = new Usuario();
        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setPassword($password);
        return UsuarioDao::getUsuario($obj_usuario);
    }

    public static function mostrarUsuarios() {
        return UsuarioDao::mostrarUsuarios();
    }

    public static function registrar($usuario, $password, $estado, $idRol) {
        $obj_usuario = new Usuario();
        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setPassword($password);
        $obj_usuario->setEstado($estado);
        $obj_usuario->setIdRol($idRol);
        return UsuarioDao::registrar($obj_usuario);
    }

    public static function editarUsuario($idUsuario, $nombreUsuario, $estado, $idRol) {
        $obj_Rol = new Usuario();
        $obj_Rol->setIdUsuario($idUsuario);
        $obj_Rol->setUsuario($nombreUsuario);
        $obj_Rol->setEstado($estado);
        $obj_Rol->setIdRol($idRol);
        return UsuarioDao::editarUsuario($obj_Rol);
    }

    public static function existe($nombre) {
        return UsuarioDao::existe($nombre);
    }

    public static function desactivarUsuario($idUsuario) {
        return UsuarioDao::desactivarUsuario($idUsuario);
    }

    // Mostrar roles
    public static function mostrarRoles() {
        return UsuarioDao::mostrarRoles();
    }

    public static function backup() {
        return UsuarioDao::backup();
    }

    public static function actualizarPassword($usuario, $password) {
        return UsuarioDao::actualizarPassword($usuario, $password);
    }
}
