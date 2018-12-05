<?php
include 'Conexion.php';
include '../entidades/Auditoria.php';

class AuditoriaDao extends Conexion {
    protected static $conexion;

    private static function getConexion() {
        self::$conexion = Conexion::conectar();
    }

    private static function desconectar() {
        self::$conexion = null;
    }

    public static function mostrarAuditoria() {
        $query = "select * from Auditoria a
              join DetalleAuditoria da
              on a.idAuditoria=da.Auditoria_idAuditoria
";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado;
    }

    // Metodo para mostrar usuarios
    public static function mostrarUsuarios() {
        self::desconectar();
        $query = "SELECT * FROM Usuario u 
              INNER JOIN UsuarioRol ur 
              ON u.idUsuario=ur.Usuario_idUsuario
              INNER JOIN Rol r
              ON ur.Rol_idRol=r.idRol";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado;
    }

    // Metodo para mostrar usuarios
    public static function mostrarTablas() {
        self::desconectar();
        $query = "SELECT object_id, name 
              FROM sys.Tables 
              where name not in(
              'sysdiagrams', 
              'auditoria', 
              'detalleauditoria', 
              'usuariorol',
              'empleadocargo',
              'rolpermiso'
              )";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado;
    }
}