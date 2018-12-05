<?php
include '../datos/EmpleadoDao.php';

class EmpleadoControlador
{
    public static function mostrarEmpleados()
    {
        return EmpleadoDao::mostrarEmpleados();
    }

    public static function obtenerEmpleado($idDepartamento)
    {
        return EmpleadoDao::obtenerEmpleado($idDepartamento);
    }

    public static function eliminarEmpleado($idEmpleado)
    {
        return EmpleadoDao::eliminarEmpleado($idEmpleado);
    }

    public static function mostrarHorarios()
    {
        return EmpleadoDao::mostrarHorarios();
    }

    public static function mostrarEstadoCivil()
    {
        return EmpleadoDao::mostrarEstadoCivil();
    }

    public static function mostrarContratos()
    {
        return EmpleadoDao::mostrarContratos();
    }

    public static function mostrarDepartamentos() {
        return EmpleadoDao::mostrarDepartamentos();
    }

    public static function mostrarCargos() {
        return EmpleadoDao::mostrarCargos();
    }

    public static function mostrarSalarios() {
        return EmpleadoDao::mostrarSalarios();
    }

    public static function mostrarSalariosEmpleados($idDepartamento) {
        return EmpleadoDao::mostrarSalariosEmpleados($idDepartamento);
    }

    public static function agregarEmpleado(
        $txtNombreEmpleado, $txtApellidoEmpleado, $txtCi, $fechaNac, $cbSexo, $txtTelefono,
        $txtDireccion, $txtEmail, $cbCivil, $txtSalario, $cbCargo, $cbDepartamento)
    {
        $obj_empleado = new Empleado();
        $obj_empleado->setNombre($txtNombreEmpleado);
        $obj_empleado->setApellido($txtApellidoEmpleado);
        $obj_empleado->setCi($txtCi);
        $obj_empleado->setFechaNacimiento($fechaNac);
        $obj_empleado->setSexo($cbSexo);
        $obj_empleado->setTelefono($txtTelefono);
        $obj_empleado->setDireccion($txtDireccion);
        $obj_empleado->setEmail($txtEmail);
        $obj_empleado->setIdEstadoCivil($cbCivil);
        $obj_empleado->setSalario($txtSalario);
        $obj_empleado->setCargoIdCargo($cbCargo);
        $obj_empleado->setDepartamentoIdDepartamento($cbDepartamento);

        return EmpleadoDao::agregarEmpleado($obj_empleado);
    }

    public static function editarEmpleado($txtIdEmpleado, $txtNombreEmpleado, $txtApellidoEmpleado, $txtCi, $sexo, $fechaNac,
                                          $txtTelefono, $dir, $txtEmail, $cta, $nac, $hora, $estado, $civil, $contrato, $fechaIn, $cbDepartamento, $cbCargo)
    {
        $obj_empleado = new Empleado();
        $obj_empleado->setIdEmppleado($txtIdEmpleado);
        $obj_empleado->setNombre($txtNombreEmpleado);
        $obj_empleado->setApellido($txtApellidoEmpleado);
        $obj_empleado->setCi($txtCi);
        $obj_empleado->setSexo($sexo);
        $obj_empleado->setFechaNacimiento($fechaNac);
        $obj_empleado->setTelefono($txtTelefono);
        $obj_empleado->setDireccion($dir);
        $obj_empleado->setEmail($txtEmail);
        $obj_empleado->setNumCuenta($cta);
        $obj_empleado->setNacionalidad($nac);
        $obj_empleado->setIdHorario($hora);
        $obj_empleado->setEstado($estado);
        $obj_empleado->setIdEstadoCivil($civil);
        $obj_empleado->setIdContrato($contrato);
        $obj_empleado->setFechaAsume($fechaIn);
        $obj_empleado->setDepartamentoIdDepartamento($cbDepartamento);
        $obj_empleado->setCargoIdCargo($cbCargo);


        return EmpleadoDao::editarEmpleado($obj_empleado);
    }

    public static function actualizarSalario($txtIdEmpleado, $salario) {
        $obj_empleado = new Empleado();
        $obj_empleado->setIdEmppleado($txtIdEmpleado);
        $obj_empleado->setSalario($salario);

        return EmpleadoDao::actualizarSalario($obj_empleado);
    }
}
