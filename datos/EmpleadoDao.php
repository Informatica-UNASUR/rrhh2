<?php
include 'Conexion.php';
include '../entidades/Empleado.php';

class EmpleadoDao extends Conexion {
    protected static $conexion;

    private static function getConexion() {
        self::$conexion = Conexion::conectar();
    }

    private static function desconectar() {
        self::$conexion = null;
    }

    public static function mostrarEmpleados() {
        $query = "SELECT idEmpleado, nombre, apellido, 
            ci, fechaNacimiento, sexo, telefono, direccion, email, nombreConyuge, foto, estado, 
            EstadoCivil_idEstadoCivil, fechaAsume, salarioFijo, idCargo, nombreCargo, idDepartamento, nombreDepartamento
            FROM empleado e
            inner join empleadocargo ec
            on e.idEmpleado=ec.Empleado_idEmpleado
            inner join cargo c
            on ec.Cargo_idCargo=c.idCargo
            inner join departamento d
            on ec.Departamento_idDepartamento=d.idDepartamento order by nombreDepartamento";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        //return $resultado->fetchAll();
        return $resultado;
    }

    public static function obtenerEmpleado($idDepartamento) {
        $query = "select idEmpleado, idDepartamento,nombre, apellido, nombreDepartamento 
              from empleado e
              inner join empleadocargo ec
              on e.idEmpleado=ec.Empleado_idEmpleado
              inner join departamento d
              on ec.Departamento_idDepartamento=d.idDepartamento
              where idDepartamento = '$idDepartamento' and e.estado = 1
              order by nombre ASC";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado;
    }

    public static function mostrarHorarios() {
        $query = "select * from horario";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado;
    }

    public static function mostrarEstadoCivil() {
        $query = "select * from estadoCivil";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado;
    }

    public static function mostrarContratos() {
        $query = "select * from contrato";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado;
    }

    public static function mostrarDepartamentos() {
        $query = "SELECT idDepartamento, nombreDepartamento FROM departamento";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado;
    }

    public static function mostrarCargos() {
        $query = "SELECT * FROM cargo";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado;
    }

    public static function mostrarSalarios() {
        $query = "select idEmpleado, ci, nombre, apellido, salarioFijo
              from empleado e
              join empleadocargo ec
              on e.idEmpleado=ec.Empleado_idEmpleado
              where e.estado = 1";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado;
    }


    public static function mostrarSalariosEmpleados($idDepartamento) {
        if($idDepartamento == '0') { // Todos los departamentos
            $id = "e.estado = 1 ";
        } else {
            $id = "d.idDepartamento=".$idDepartamento." and e.estado = 1 ";
        }
        $query = "select idEmpleado, ci, nombre, apellido, salarioFijo, nombreDepartamento, nombreCargo
              from empleado e
              join empleadocargo ec
              on e.idEmpleado=ec.Empleado_idEmpleado
              join Departamento d 
              on ec.Departamento_idDepartamento=d.idDepartamento
              join cargo c
              on ec.Cargo_idCargo=c.idCargo
              where ".$id."order by nombre asc";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        $empleado = array();
        do {
            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $empleado[] = $row;
            }
        } while (next($resultado));

        return $empleado;
    }

    public static function actualizarSalario($dato) {
        $idEmpleado = $dato->getIdEmppleado();
        $salario    = $dato->getSalario();

        $query = "update empleadocargo set salarioFijo = '$salario' where Empleado_idEmpleado = '$idEmpleado'";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        if($resultado) {
            return $resultado;
        }

    }

    public static function eliminarEmpleado($dato) {
        $idEmpleado = $dato;

        $query = "update empleado set estado = 0 where idEmpleado = '$idEmpleado'";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);

        $resultado->execute();

        if($resultado) {
            return $resultado;
        }

    }

    public static function agregarEmpleado($empleado) {
        $nombre = $empleado->getNombre();
        $apellido = $empleado->getApellido();
        $ci = $empleado->getCi();
        $fechaNac = $empleado->getFechaNacimiento();
        $sexo = $empleado->getSexo();
        $tel = $empleado->getTelefono();
        $dir = $empleado->getDireccion();
        $email = $empleado->getEmail();
        $cta = $empleado->getNumCuenta();
        $nac = $empleado->getNacionalidad();
        $horario = $empleado->getIdHorario();
        $civil = $empleado->getIdEstadoCivil();
        $contrato = $empleado->getIdContrato();
        $salario = $empleado->getSalario();
        $fechaAsume = $empleado->getFechaAsume();
        $cargo = $empleado->getCargoIdCargo();
        $dpto = $empleado->getDepartamentoIdDepartamento();
        $query = "call sp_registrar_empleado(:nombre,:apellido,:ci,:fechanac,:sexo,:tel,:dir,:email,:cta,:nac,:horario,:civil,:contrato,:salario,:fechaasume,:cargo,:dpto)";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->bindValue(":nombre", $nombre);
        $resultado->bindValue(":apellido", $apellido);
        $resultado->bindValue(":ci", $ci);
        $resultado->bindValue(":fechanac", $fechaNac);
        $resultado->bindValue(":sexo", $sexo);
        $resultado->bindValue(":tel", $tel);
        $resultado->bindValue(":dir", $dir);
        $resultado->bindValue(":email", $email);
        $resultado->bindValue(":cta", $cta);
        $resultado->bindValue(":nac", $nac);
        $resultado->bindValue(":horario", $horario);
        $resultado->bindValue(":civil", $civil);
        $resultado->bindValue(":contrato", $contrato);
        $resultado->bindValue(":salario", $salario);
        $resultado->bindValue(":fechanac", $fechaNac);
        $resultado->bindValue(":fechaasume", $fechaAsume);
        $resultado->bindValue(":cargo", $cargo);
        $resultado->bindValue(":dpto", $dpto);


        $resultado->execute();

        if($resultado) {
            return $resultado;
        }
    }

    public static function editarEmpleado($empleado) {
        $txtIdEmpleado = $empleado->getIdEmppleado();
        $nombre        = $empleado->getNombre();
        $apellido      = $empleado->getApellido();
        $ci            = $empleado->getCi();
        $sexo          = $empleado->getSexo();
        $fechaNac      = $empleado->getFechaNacimiento();
        $tel           = $empleado->getTelefono();
        $dir           = $empleado->getDireccion();
        $email         = $empleado->getEmail();
        $cta           = $empleado->getNumCuenta();
        $nac           = $empleado->getNacionalidad();
        $horario       = $empleado->getIdHorario();
        $estado        = $empleado->getEstado();
        $civil         = $empleado->getIdEstadoCivil();
        $contrato      = $empleado->getIdContrato();
        $fechaAsume    = $empleado->getFechaAsume();
        $dpto          = $empleado->getDepartamentoIdDepartamento();
        $cargo         = $empleado->getCargoIdCargo();

        $q0 = "update empleadocargo set Departamento_idDepartamento = ('$dpto'),
               Cargo_idCargo = ('$cargo'), fechaAsume = '$fechaAsume'
               where Empleado_idEmpleado = ('$txtIdEmpleado')";

        $q = "UPDATE empleado 
              SET nombre = ('$nombre'), 
              apellido = ('$apellido'), 
              ci = ('$ci'), 
              sexo = '$sexo', 
              fechaNacimiento = '$fechaNac', 
              telefono = '$tel',
              direccion = '$dir', 
              email = '$email', 
              numCuenta = '$cta', 
              nacionalidad = '$nac', 
              Horario_idHorario = '$horario',
              estado = '$estado', 
              EstadoCivil_idEstadoCivil = '$civil', 
              Contrato_idContrato = '$contrato' 
              WHERE idEmpleado = ('$txtIdEmpleado') ";

        self::getConexion();

        $resultado0 = self::$conexion->prepare($q0);
        $resultado = self::$conexion->prepare($q);

        $resultado0->execute();
        $resultado->execute();

        return $resultado;
    }
}
