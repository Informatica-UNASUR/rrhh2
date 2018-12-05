<?php
include 'Conexion.php';
include '../entidades/Deduccion.php';

class DeduccionDao extends Conexion {
    protected static $conexion;

    private static function getConexion() {
        self::$conexion = Conexion::conectar();
    }

    private static function desconectar() {
        self::$conexion = null;
    }

    public static function registrarDeduccion($deduccion) {
        $nombre = $deduccion->getTipoDeduccion();

        $query = "INSERT INTO TipoDeduccion (tipoDeduccion) VALUES ('$nombre')";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        if($resultado) {
            return $resultado;
        }
        //return false;
    }

    public static function agregarDeduccion($deduccion) {
        $idEmpleado = $deduccion->getEmpleadoIdEmpleado();
        $idDeduccion = $deduccion->getTipoDeduccionIdDeduccion();
        $montoDeduccion = $deduccion->getMontoDeduccion();
        $fechaDeduccion = $deduccion->getFechaDeduccion();
        $obsDeduccion = $deduccion->getObservacion();

        $query = "call sp_agregar_deduccion(:idEmpleado,:idDeduccion,:montoDeduccion,:fechaDeduccion,:obsDeduccion)";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->bindValue(":idEmpleado",     $idEmpleado);
        $resultado->bindValue(":idDeduccion",    $idDeduccion);
        $resultado->bindValue(":montoDeduccion", $montoDeduccion);
        $resultado->bindValue(":fechaDeduccion", $fechaDeduccion);
        $resultado->bindValue(":obsDeduccion",   $obsDeduccion);

        $resultado->execute();

        if($resultado) {
            return $resultado;
        }
        //return false;
    }

    public static function editarDeduccion($deduccion) {
        $idDeduccion     = $deduccion->getIdDeduccion();
        $NombreDeduccion = $deduccion->getNombreDeduccion();

        $query = "UPDATE Deduccion SET nombreDeduccion = ('$NombreDeduccion') WHERE idDeduccion = ('$idDeduccion')";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        if($resultado) {
            return true;
        }
        return false;
    }

    // Metodo para mostrar deduccions
    public static function mostrarDeducciones() {
        $query = "SELECT * FROM TipoDeduccion";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado;
    }

    public static function mostrarDeduccionesP($idEmpleado) {
        $q = "select * from Empleado e
              inner join Deduccion d
              on e.idEmpleado=d.Empleado_idEmpleado
              inner join TipoDeduccion td
              on d.TipoDeduccion_idTipoDeduccion=td.idTipoDeduccion
              where idEmpleado = '$idEmpleado'";

        self::getConexion();

        $resultado = self::$conexion->prepare($q);
        $resultado->execute();

        return $resultado;
    }

    // Metodo para eliminar deduccion
    public static function eliminarDeduccion($idDeduccion) {
        $query = "DELETE FROM Deduccion WHERE idDeduccion = ('$idDeduccion')";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        if($resultado) {
            return true;
        }
        return false;
    }
}