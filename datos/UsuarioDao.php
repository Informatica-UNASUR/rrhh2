<?php
include 'Conexion.php';
include '../entidades/Usuario.php';
include '../entidades/Rol.php';
include '../entidades/Departamento.php';

class UsuarioDao extends Conexion {
    protected static $conexion;

    private static function getConexion() {
        self::$conexion = Conexion::conectar();
    }

    private static function desconectar() {
        self::$conexion = null;
    }

    public static function login($usuario) {
        $query = "SELECT * FROM rrhh.usuario WHERE usuario = :usuario";

        self::getConexion();
        $resultado = self::$conexion->prepare($query);
        $resultado->bindValue(":usuario", $usuario->getUsuario());

        $resultado->execute();

        if ($resultado->rowCount() > 0) {
            $filas = $resultado->fetch(); // Rellena toda la info que tiene resultado y lo va a tratar como array
            if ($filas["usuario"] == $usuario->getUsuario()
                && password_verify($usuario->getPassword(), $filas["password"])) {
                return true;
            }
        } else {
            print_r("Usuario y password no encontrados + []");
        }
        return false;
    }

    // Metodo que obtiene un usuario
    public static function getUsuario($usuario) {
        $query = "SELECT * FROM usuario u INNER JOIN usuariorol ur ON u.idUsuario=ur.Usuario_idUsuario WHERE u.usuario= :usuario";

        self::getConexion();
        $resultado = self::$conexion->prepare($query);
        $resultado->bindValue(":usuario", $usuario->getUsuario());
        //$resultado->bindValue(":password", $usuario->getPassword());

        $resultado->execute();

        if ($resultado->rowCount() > 0) {
            $filas = $resultado->fetch(); // Rellena toda la info que tiene resultado y lo va a tratar como array
            if ($filas["usuario"] == $usuario->getUsuario()
                && password_verify($usuario->getPassword(), $filas["password"])) {
                $usuario = new Usuario();
                $usuario->setIdUsuario($filas["idUsuario"]);
                $usuario->setUsuario($filas["usuario"]);
                $usuario->setFechaAlta($filas["fechaAlta"]);
                $usuario->setEstado($filas["estado"]);
                $usuario->setIdRol($filas["Rol_idRol"]);

                return $usuario;
            }
        } else {
            print_r("Error en la consulta: $query");
            return false;
        }
        return false;
    }

    // Metodo para mostrar usuarios
    public static function mostrarUsuarios() {
        $query = "SELECT * FROM rrhh.usuario u 
              INNER JOIN rrhh.usuariorol ur 
              ON u.idUsuario=ur.Usuario_idUsuario
              INNER JOIN rrhh.rol r
              ON ur.Rol_idRol=r.idRol";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado->fetchAll();
    }

    // Metodo para mostrar roles
    public static function mostrarRoles() {
        $query = "SELECT * FROM rrhh.rol";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado->fetchAll();
    }

    public static function registrar($usuario) {
        $user   = $usuario->getUsuario();
        $pass   = $usuario->getPassword();
        $estado = $usuario->getEstado();
        $idRol = $usuario->getIdRol();
        $query = "call sp_registrar_usuario(:usuario,:password, :estado, :idRol);";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->bindValue(":usuario", $user);
        $resultado->bindValue(":password", $pass);
        $resultado->bindValue(":estado", $estado);
        $resultado->bindValue(":idRol", $idRol);

        $resultado->execute();

        if($resultado) {
            return true;
        }
        return false;
    }

    public static function editarUsuario($usuario) {
        $idUsuario       = $usuario->getIdUsuario();
        $nombreUsuario   = $usuario->getUsuario();
        $estado          = $usuario->getEstado();
        $idRol           = $usuario->getIdRol();
        $query = "call sp_actualizar_usuario(:idUsuario, :usuario, :estado, :idRol);";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->bindValue(":idUsuario", $idUsuario);
        $resultado->bindValue(":usuario", $nombreUsuario);
        $resultado->bindValue(":estado", $estado);
        $resultado->bindValue(":idRol", $idRol);

        $resultado->execute();

        if($resultado) {
            return true;
        }
        return false;
    }

    public static function desactivarUsuario($idUsuario) {
        $query = "UPDATE usuario SET estado = '0' WHERE usuario.idUsuario = $idUsuario;";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);

        $resultado->execute();

        if($resultado) {
            return true;
        }
        return false;
    }

    public static function existe($nombre) {
        $query = "SELECT usuario FROM rrhh.usuario WHERE usuario = ('$nombre')";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        if ($resultado->rowCount() === 1) {
            return true;
        } else {
            return false;
        }
    }

    public static function actualizarPassword($usuario, $password) {
        $query = "UPDATE usuario SET password = '$password' WHERE usuario.idUsuario = ('$usuario')";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        if ($resultado->rowCount() === 1) {
            return true;
        } else {
            return false;
        }
    }
}
