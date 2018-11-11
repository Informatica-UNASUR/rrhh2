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

if($_SERVER["REQUEST_METHOD"] == "POST") {
     if(isset($_POST["txtUsuario"]) &&
        isset($_POST["txtPassword"]) &&
        isset($_POST["txtEstado"]) &&
        isset($_POST["txtRol"])){

         $txtUsuario = validar_campo($_POST["txtUsuario"]);
         $txtPassword = validar_campo($_POST["txtPassword"]);
         $txtEstado = validar_campo($_POST["txtEstado"]);
         $idRol = $_POST["txtRol"];
         $passwordCifrado = password_hash($txtPassword, PASSWORD_DEFAULT);

        if(UsuarioControlador::registrar($txtUsuario, $passwordCifrado, $txtEstado, $idRol)) {
            header("location:user.php");
        }
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




