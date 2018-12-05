<?php
include 'Conexion.php';
include '../entidades/Devengo.php';

class DevengoDao extends Conexion
{
    protected static $conexion;

    private static function getConexion()
    {
        self::$conexion = Conexion::conectar();
    }

    private static function desconectar()
    {
        self::$conexion = null;
    }

    public static function registrarDevengo($devengo) {
        $nombre = $devengo->getTipoDevengo();

        $query = "INSERT INTO TipoDevengo (TipoDevengo) VALUES ('$nombre')";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        if ($resultado) {
            return $resultado;
        }
        //return false;
    }

    public static function agregarDevengo($devengo)
    {
        $idEmpleado   = $devengo->getEmpleadoIdEmpleado();
        $idDevengo    = $devengo->getTipoDevengoIdDevengo();
        $montoDevengo = $devengo->getMontoDevengo();
        $fechaDevengo = $devengo->getFechaDevengo();
        $obsDevengo   = $devengo->getObservacion();

        $query = "call sp_agregar_devengo(:idEmpleado,:idDevengo,:montoDevengo,:fechaDevengo,:obsDevengo)";


        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->bindValue(":idEmpleado",   $idEmpleado);
        $resultado->bindValue(":idDevengo",    $idDevengo);
        $resultado->bindValue(":montoDevengo", $montoDevengo);
        $resultado->bindValue(":fechaDevengo", $fechaDevengo);
        $resultado->bindValue(":obsDevengo",   $obsDevengo);

        $resultado->execute();

        if ($resultado) {
            return $resultado;
        }
        //return false;
    }

    // Metodo para mostrar deduccions
    public static function mostrarDevengos()
    {
        $query = "SELECT * FROM TipoDevengo";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado;
    }

    public static function mostrarDevengoesP()
    {
//        $q = "SELECT * FROM rrhh_db.tipodeduccion";
        $query = "select * from Empleado e
              inner join Deduccion d
              on e.idEmpleado=d.Empleado_idEmpleado
              inner join TipoDeduccion td
              on d.TipoDevengo_idTipoDevengo=td.idTipoDevengo";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado;
    }

    public static function existe($nombre) {
        $query = "SELECT tipodevengo FROM TipoDevengo WHERE tipodevengo = ('$nombre')";

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