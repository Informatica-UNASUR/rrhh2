<?php
/**
 * Created by PhpStorm.
 * User: Jose
 * Date: 26/2/2018
 * Time: 16:37
 */
include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

session_start();

//header('Content-type: application/json');
header('Content-type:application/json;charset=utf-8');
$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST") { // Validar que el metodo de envio sea POST
    if(!empty($_POST["txtUsuario"]) && !empty($_POST["txtPassword"])) {

        $txtUsuario = validar_campo($_POST["txtUsuario"]);
        $txtPassword = validar_campo($_POST["txtPassword"]);

//        $resultado = array("valor" => "true");

        if(UsuarioControlador::login($txtUsuario, $txtPassword)) { // Si el user existe
            $usuario = UsuarioControlador::getUsuario($txtUsuario, $txtPassword);

            if($usuario->getEstado()) {
                $_SESSION["usuario"] = array(
                    "idUsuario" => $usuario->getIdUsuario(),
                    "usuario"   => $usuario->getUsuario(),
                    "fechaAlta" => $usuario->getFechaAlta(),
                    "estado"    => $usuario->getEstado(),
                    "Rol_idRol" => $usuario->getIdRol()
                );
                $log = UsuarioControlador::insertLogs($usuario->getIdUsuario());
                $resultado = array("valor" => "true", "id_empleado" => $_SESSION["usuario"]["idUsuario"]);
                return print(json_encode($resultado));
            }
            $resultado = array("valor" => "inactivo");
            return print(json_encode($resultado));
        }
        // Si no existe
        print_r ("Acceso denegado debido a credenciales no válidas\n");
        $resultado = array("valor" => "false");
        return print(json_encode($resultado));
    }
} else {
    header("location:index.php");
}

$resultado = array("valor" => "false");
return print(json_encode($resultado));


