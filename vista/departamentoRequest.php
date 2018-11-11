<?php
include '../controlador/DepartamentoControlador.php';
include '../helps/helps.php';

$opcion = $_POST["opcion"];
$txtNombreDepartamento = $_POST["txtNombreDepartamento"];
$informacion = [];

if($opcion != 'registrar') {
    $txtIdDepartamento = $_POST["txtIdDepartamento"];
} else {
    $txtIdDepartamento = "0";
}

switch ($opcion) {
    case 'registrar':
        $existe = existeDepartamento($txtNombreDepartamento);
        if ($existe) {
            $informacion["respuesta"] = "EXISTE";
            echo json_encode($informacion);
        } else {
            agregar($txtNombreDepartamento);
        }
        break;
    case 'modificar':
        $existe = existeDepartamento($txtNombreDepartamento);
        if ($existe) {
            $informacion["respuesta"] = "EXISTE";
            echo json_encode($informacion);
        } else {
            modificar($txtIdDepartamento, $txtNombreDepartamento);
        }
        break;
    case 'eliminar':
        eliminar($txtIdDepartamento);
        break;
    default:
        $informacion["respuesta"] = "OPCION VACIA";
        echo json_encode($informacion);
        break;
}

function existeDepartamento($txtNombreDepartamento) {
    $resultado = DepartamentoControlador::existeDepartamento($txtNombreDepartamento);
    return $resultado;
}

function agregar($txtNombreDepartamento) {
    $resultado = DepartamentoControlador::registrarDepartamento($txtNombreDepartamento);
    verificar_resultado($resultado);
}

function modificar($txtIdDepartamento, $txtNombreDepartamento) {
    $resultado = DepartamentoControlador::editarDepartamento($txtIdDepartamento, $txtNombreDepartamento);

    verificar_resultado($resultado);
}

function eliminar($txtIdDepartamento) {
    $resultado = DepartamentoControlador::eliminarDepartamento($txtIdDepartamento);
    verificar_resultado($resultado);
}

function verificar_resultado($resultado) {
    if(!$resultado) $informacion["respuesta"] = "ERROR";
    else $informacion["respuesta"] = "BIEN";
    echo json_encode($informacion);
}



