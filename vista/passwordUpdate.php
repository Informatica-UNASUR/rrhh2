<?php
/**
 * Created by PhpStorm.
 * User: Jose
 * Date: 26/2/2018
 * Time: 16:37
 */
include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

//session_start();

header('Content-type:application/json;charset=utf-8');
$resultado = array();

$opcion = $_POST["opcion"];
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if($opcion == "updatePassword") {
        if(isset($_POST["txtContrasena"]) && isset($_POST["txtNuevaContrasena"]) && isset($_POST["txtConfirmarContrasena"])){

            $passwordOld     = validar_campo($_POST["txtContrasena"]);
            $passwordNew     = validar_campo($_POST["txtNuevaContrasena"]);
            $passwordConfirm = validar_campo($_POST["txtConfirmarContrasena"]);
            $usuario         = $_POST["txtUsuario"];
            $idUsuario       = $_POST["txtIdUsuario"];

            if(UsuarioControlador::login($usuario, $passwordOld)) {
                if ($passwordNew == $passwordConfirm) {
                    $passwordCifrado = password_hash($passwordNew, PASSWORD_DEFAULT);
                    UsuarioControlador::actualizarPassword($idUsuario, $passwordCifrado);
                    $resultado = array("valor" => "true");
                    return print(json_encode($resultado));
                } else {
                    $resultado = array("valor" => "bad");
                    return print(json_encode($resultado));
                    //print_r("Las contrasenas deben ser iguales");
                }
            } else {
                $resultado = array("valor" => "false");
                return print(json_encode($resultado));
                //print_r("Las credenciales no son correctas");
            }
        }
    } else if ($opcion == "resetPassword") {
        $password = validar_campo($_POST["txtContrasenaNueva"]);
        $usuario  = $_POST["txtIdUsuario"];
        $passwordCifrado = password_hash($password, PASSWORD_DEFAULT);
        UsuarioControlador::actualizarPassword($usuario, $passwordCifrado);
        $resultado = array("valor" => "true");
        return print(json_encode($resultado));
        //header("location:user.php");
    }
} else {
    header("location:index.php");
}

// A IMPLEMENTAR
// Funcion para no insertar 2 usuarios con el mismo nombre.
function existe($nombre) {
    $resultado = UsuarioControlador::existe($nombre);
    return $resultado;
}




