<?php
/*
 * Funcion para validar y limpiar un campo
 * $campo de tipo POST
 * */
function validar_campo($campo) {
    $campo = trim($campo);
    $campo = stripcslashes($campo); // Elimina barras inclinadas
    $campo = htmlspecialchars($campo); // Limpia todas los campos scripts

    return $campo;
}