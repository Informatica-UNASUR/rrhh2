<?php
include '../controlador/EmpleadoControlador.php';
include '../helps/helps.php';

$opcion = $_POST["opcion"];
$informacion = [];


if($opcion == 'registrar') {
    $resultado = EmpleadoControlador::agregarEmpleado($_POST["txtNombre"], $_POST["txtApellido"], $_POST["txtCi"],
        $_POST["fechaNac"], $_POST["cbSexo"], $_POST["txtTelefono"], $_POST["txtDireccion"], $_POST["txtEmail"],
        $_POST["txtCtaBanco"], $_POST["txtNacionalidad"], $_POST["cbHorario"], $_POST["cbCivil"], $_POST["txtContrato"],
        $_POST["txtSalario"],$_POST["txtFechaIn"], $_POST["cbCargo"], $_POST["cbDepartamento"]);

    verificar_resultado($resultado);
} elseif ($opcion == 'modificar') {
    $resultado = EmpleadoControlador::editarEmpleado($_POST["txtIdEmpleado"] ,$_POST["txtNombre"], $_POST["txtApellido"], $_POST["txtCi"],
        $_POST["cbSexo"], $_POST["fechaNac"],$_POST["txtTelefono"],$_POST["txtDireccion"],$_POST["txtEmail"],$_POST["txtCtaBanco"],
        $_POST["txtNacionalidad"], $_POST["cbHorario"], $_POST["txtEstado"], $_POST["cbCivil"], $_POST["txtContrato"],
        $_POST["txtFechaIn"], $_POST["cbDepartamento"], $_POST["cbCargo"]);

    verificar_resultado($resultado);
} elseif ($opcion == 'eliminar') {
    $txtIdEmpleado = $_POST["txtIdEmpleado"];
    $resultado = EmpleadoControlador::eliminarEmpleado($txtIdEmpleado);
    verificar_resultado($resultado);
}

function verificar_resultado($resultado) {
    if(!$resultado) $informacion["respuesta"] = "ERROR";
    else $informacion["respuesta"] = "BIEN";
    echo json_encode($informacion);
}



