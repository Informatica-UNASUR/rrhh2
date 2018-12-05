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
            FROM Empleado e
            inner join EmpleadoCargo ec
            on e.idEmpleado=ec.Empleado_idEmpleado
            inner join Cargo c
            on ec.Cargo_idCargo=c.idCargo
            inner join Departamento d
            on ec.Departamento_idDepartamento=d.idDepartamento order by nombreDepartamento";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        //return $resultado->fetchAll();
        return $resultado;
    }

    public static function obtenerEmpleado($idDepartamento) {
        $query = "select idEmpleado, idDepartamento,nombre, apellido, nombreDepartamento 
              from Empleado e
              inner join EmpleadoCargo ec
              on e.idEmpleado=ec.Empleado_idEmpleado
              inner join Departamento d
              on ec.Departamento_idDepartamento=d.idDepartamento
              where idDepartamento = '$idDepartamento' and e.estado = 1
              order by nombre ASC";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado;
    }

    public static function mostrarHorarios() {
        $query = "select * from Horario";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado;
    }

    public static function mostrarEstadoCivil() {
        $query = "select * from EstadoCivil";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado;
    }

    public static function mostrarContratos() {
        $query = "select * from Contrato";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado;
    }

    public static function mostrarDepartamentos() {
        $query = "SELECT idDepartamento, nombreDepartamento FROM Departamento";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado;
    }

    public static function mostrarCargos() {
        $query = "SELECT * FROM Cargo";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        return $resultado;
    }

    public static function mostrarSalarios() {
        $query = "select idEmpleado, ci, nombre, apellido, salarioFijo
              from Empleado e
              join EmpleadoCargo ec
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
              from Empleado e
              join EmpleadoCargo ec
              on e.idEmpleado=ec.Empleado_idEmpleado
              join Departamento d 
              on ec.Departamento_idDepartamento=d.idDepartamento
              join Cargo c
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

        $query = "update EmpleadoCargo set salarioFijo = '$salario' where Empleado_idEmpleado = '$idEmpleado'";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->execute();

        if($resultado) {
            return $resultado;
        }

    }

    public static function eliminarEmpleado($dato) {
        $idEmpleado = $dato;

        $query = "update Empleado set estado = 0 where idEmpleado = '$idEmpleado'";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);

        $resultado->execute();

        if($resultado) {
            return $resultado;
        }

    }

    public static function agregarEmpleado($empleado) {
        $nombre  = $empleado->getNombre();
        $apellido = $empleado->getApellido();
        $ci      = $empleado->getCi();
        $fechaNac= $empleado->getFechaNacimiento();
        $sexo    = $empleado->getSexo();
        $tel     = $empleado->getTelefono();
        $dir     = $empleado->getDireccion();
        $email   = $empleado->getEmail();
        $conyuge = $empleado->getNombreConyuge();
        $civil   = $empleado->getIdEstadoCivil();
        $salario = $empleado->getSalario();
        $cargo   = $empleado->getCargoIdCargo();
        $dpto    = $empleado->getDepartamentoIdDepartamento();
        $query = "call sp_registrar_empleado(:nombre,:apellido,:ci,:fechanac,:sexo,:tel,:dir,:email,:conyuge, :civil,:salario,:cargo,:dpto)";

        self::getConexion();

        $resultado = self::$conexion->prepare($query);
        $resultado->bindValue(":nombre",   $nombre);
        $resultado->bindValue(":apellido", $apellido);
        $resultado->bindValue(":ci",       $ci);
        $resultado->bindValue(":fechanac", $fechaNac);
        $resultado->bindValue(":sexo",     $sexo);
        $resultado->bindValue(":tel",      $tel);
        $resultado->bindValue(":dir",      $dir);
        $resultado->bindValue(":email",    $email);
        $resultado->bindValue(":conyuge",  $conyuge);
        $resultado->bindValue(":civil",    $civil);
        $resultado->bindValue(":salario",  $salario);
        $resultado->bindValue(":cargo",    $cargo);
        $resultado->bindValue(":dpto",     $dpto);


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
        $fechaNac      = $empleado->getFechaNacimiento();
        $sexo          = $empleado->getSexo();
        $tel           = $empleado->getTelefono();
        $dir           = $empleado->getDireccion();
        $email         = $empleado->getEmail();
        $conyuge       = $empleado->getConyuge();
        $civil         = $empleado->getIdEstadoCivil();
        $estado        = $empleado->getEstado();
        $dpto          = $empleado->getDepartamentoIdDepartamento();
        $cargo         = $empleado->getCargoIdCargo();

        $q0 = "update EmpleadoCargo set Departamento_idDepartamento = ('$dpto'),
               Cargo_idCargo = ('$cargo') where Empleado_idEmpleado = ('$txtIdEmpleado')";

        $q = "UPDATE Empleado 
              SET nombre = ('$nombre'), 
              apellido = ('$apellido'), 
              ci = ('$ci'), 
              sexo = '$sexo', 
              fechaNacimiento = '$fechaNac', 
              telefono = '$tel',
              direccion = '$dir', 
              email = '$email'
              estado = '$estado', 
              EstadoCivil_idEstadoCivil = '$civil', 
              WHERE idEmpleado = ('$txtIdEmpleado') ";

        self::getConexion();

        $resultado0 = self::$conexion->prepare($q0);
        $resultado = self::$conexion->prepare($q);

        $resultado0->execute();
        $resultado->execute();

        return $resultado;
    }
}
