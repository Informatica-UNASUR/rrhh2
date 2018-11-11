<?php
include 'Conexion.php';
include '../entidades/Departamento.php';

class DepartamentoDao extends Conexion {
    protected static $conexion;

    private static function getConexion() {
        self::$conexion = Conexion::conectar();
    }

    private static function desconectar() {
        self::$conexion = null;
    }

    public static function registrarDepartamento($departamento) {
        $nombre      = $departamento->getNombreDepartamento();

        $query = "INSERT INTO rrhh.departamento(nombreDepartamento) VALUES ('$nombre')";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        if($resultado) {
            return $resultado;
        }
//        return false;
    }

    public static function editarDepartamento($departamento) {
        $idDepartamento     = $departamento->getIdDepartamento();
        $NombreDepartamento = $departamento->getNombreDepartamento();

        $query = "UPDATE rrhh.departamento SET nombreDepartamento = ('$NombreDepartamento') WHERE idDepartamento = ('$idDepartamento')";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        if($resultado) {
            return $resultado;
        }
//        return false;
    }

    // Metodo para mostrar departamentos
    public static function mostrarDepartamentos() {
        $query = "SELECT idDepartamento, nombreDepartamento FROM rrhh.departamento";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado;
    }

    public static function mostrarDptos() {
        $query = "select DISTINCT idDepartamento, nombreDepartamento 
            from rrhh.empleado e
            inner join rrhh.empleadocargo ec
            on e.idEmpleado=ec.Empleado_idEmpleado
            inner join rrhh.departamento d
            on ec.Departamento_idDepartamento=d.idDepartamento
            where e.estado = 1";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado;
    }

    // Metodo para eliminar departamento
    public static function eliminarDepartamento($idDepartamento) {
        $query = "DELETE FROM rrhh.departamento WHERE idDepartamento = ('$idDepartamento')";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        if($resultado) {
            return $resultado;
        }
//        return false;
    }

    public static function existeDepartamento($nombreDepartamento) {
        $query = "SELECT nombreDepartamento FROM rrhh.departamento WHERE nombreDepartamento = ('$nombreDepartamento')";

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
