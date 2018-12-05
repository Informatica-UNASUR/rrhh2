<?php
include 'Conexion.php';
include '../entidades/Cargo.php';

class CargoDao extends Conexion {
    protected static $conexion;

    private static function getConexion() {
        self::$conexion = Conexion::conectar();
    }

    private static function desconectar() {
        self::$conexion = null;
    }

    public static function registrarCargo($cargo) {
        $nombre = $cargo->getNombreCargo();

        $query = "INSERT INTO cargo(nombreCargo) VALUES ('$nombre')";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        if($resultado) {
            return true;
        }
        return false;
    }

    public static function editarCargo($cargo) {
        $idCargo     = $cargo->getIdCargo();
        $NombreCargo = $cargo->getNombreCargo();

        $query = "UPDATE cargo SET nombreCargo = ('$NombreCargo') WHERE idCargo = ('$idCargo')";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        if($resultado) {
            return true;
        }
        return false;
    }

    // Metodo para mostrar cargos
    public static function mostrarCargos() {
        $query = "SELECT * FROM cargo";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado->fetchAll();
    }

    // Metodo para eliminar cargo
    public static function eliminarCargo($idCargo) {
        $query = "DELETE FROM cargo WHERE idCargo = ('$idCargo')";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        if($resultado) {
            return true;
        }
        return false;
    }
}