<?php
class Conexion {
    public static function conectar() {
        try {
            $cn = new PDO("mysql:host=u28rhuskh0x5paau.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=jeo0ktvqcythq1bl", "ucupcjvzu3bow8xp", "jtagk7cvqmvwqkgw");
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