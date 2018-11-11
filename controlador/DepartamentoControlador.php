<?php
include '../datos/DepartamentoDao.php';

class DepartamentoControlador {

    public static function registrarDepartamento($nombreDepartamento) {
        $obj_Departamento = new Departamento();
        $obj_Departamento->setNombreDepartamento($nombreDepartamento);
        return DepartamentoDao::registrarDepartamento($obj_Departamento);
    }

    public static function editarDepartamento($idDepartamento, $nombreDepartamento) {
        $obj_Departamento = new Departamento();
        $obj_Departamento->setIdDepartamento($idDepartamento);
        $obj_Departamento->setNombreDepartamento($nombreDepartamento);
        return DepartamentoDao::editarDepartamento($obj_Departamento);
    }

    // Mostrar departamentos
    public static function mostrarDepartamentos() {
        return DepartamentoDao::mostrarDepartamentos();
    }

    public static function mostrarDptos() {
        return DepartamentoDao::mostrarDptos();
    }

    public static function eliminarDepartamento($idDepartamento) {
        return DepartamentoDao::eliminarDepartamento($idDepartamento);
    }

    public static function existeDepartamento($nombreDepartamento) {
        return DepartamentoDao::existeDepartamento($nombreDepartamento);
    }

}
