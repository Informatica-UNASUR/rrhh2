<?php
class Conexion {
    public static function conectar() {
        try {
            $cn = new PDO("mysql:host=localhost;dbname=rrhh", "root", "");
            /*if($cn)
                echo "Conexion ok";
            else
                echo "Sin conexion";*/
            return $cn;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
}

//$c = new Conexion();
//$c->conectar();