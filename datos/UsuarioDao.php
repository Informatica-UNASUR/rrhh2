<?php
include 'Conexion.php';
include '../entidades/Usuario.php';
include '../entidades/Rol.php';
include '../entidades/Departamento.php';

class UsuarioDao extends Conexion {
    protected static $conexion;

    private static function getConexion() {
        return self::$conexion = Conexion::conectar();
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

    public static function insertLogs ($usuario) {
        $sql = "call sp_registrar_logs(:id);";

        $r = self::getConexion()->prepare($sql);
        $r->bindValue(":id", $usuario);
        $r->execute();
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

//        self::getConexion();

        $resultado = self::getConexion()->prepare($query);
        $resultado->execute();

        return $resultado->fetchAll();
    }

    // Metodo para mostrar roles
    public static function mostrarRoles() {
        $query = "SELECT * FROM rrhh.rol";

        //self::getConexion();

        $resultado = self::getConexion()->prepare($query);
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

    public static function backup() {
        // db config
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "rrhh";
        // db connect
        $pdo = self::getConexion();
// file header stuff
        $output = "-- PHP MySQL Dump\n--\n";
        $output .= "-- Host: $dbhost\n";
        $output .= "-- Generated: " . date("r", time()) . "\n";
        $output .= "-- PHP Version: " . phpversion() . "\n\n";
        $output .= "SET SQL_MODE=\"NO_AUTO_VALUE_ON_ZERO\";\n\n";
        $output .= "--\n-- Database: `$dbname`\n--\n";
// get all table names in db and stuff them into an array
        $tables = array();
        $stmt = $pdo->query("SHOW TABLES");
        while($row = $stmt->fetch(PDO::FETCH_NUM)){
            $tables[] = $row[0];
        }
// process each table in the db
        foreach($tables as $table){
            $fields = "";
            $sep2 = "";
            $output .= "\n-- " . str_repeat("-", 60) . "\n\n";
            $output .= "--\n-- Table structure for table `$table`\n--\n\n";
// get table create info
            $stmt = $pdo->query("SHOW CREATE TABLE $table");
            $row = $stmt->fetch(PDO::FETCH_NUM);
            $output.= $row[1].";\n\n";
// get table data
            $output .= "--\n-- Dumping data for table `$table`\n--\n\n";
            $stmt = $pdo->query("SELECT * FROM $table");
            while($row = $stmt->fetch(PDO::FETCH_OBJ)){
// runs once per table - create the INSERT INTO clause
                if($fields == ""){
                    $fields = "INSERT INTO `$table` (";
                    $sep = "";
// grab each field name
                    foreach($row as $col => $val){
                        $fields .= $sep . "`$col`";
                        $sep = ", ";
                    }
                    $fields .= ") VALUES";
                    $output .= $fields . "\n";
                }
// grab table data
                $sep = "";
                $output .= $sep2 . "(";
                foreach($row as $col => $val){
// add slashes to field content
                    $val = addslashes($val);
// replace stuff that needs replacing
                    $search = array("\'", "\n", "\r");
                    $replace = array("''", "\\n", "\\r");
                    $val = str_replace($search, $replace, $val);
                    $output .= $sep . "'$val'";
                    $sep = ", ";
                }
// terminate row data
                $output .= ")";
                $sep2 = ",\n";
            }
// terminate insert data
            $output .= ";\n";
        }
// output file to browser
        date_default_timezone_set('America/Asuncion');
        header('Content-Description: File Transfer');
        header('Content-type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $dbname . '_backup_'.date("dmyHis"). '.sql');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . strlen($output));
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        header('Pragma: public');
        echo $output;
    }
}
