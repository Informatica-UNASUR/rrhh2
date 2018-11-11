DELIMITER //
create procedure sp_registrar_empleado (
  IN _nombre varchar(30),
  IN _apellido varchar(30),
  IN _ci varchar(15),
  IN _fechaNac date,
  IN _sexo char(1),
  IN _tel varchar(10),
  IN _dir nvarchar(50),
  IN _email varchar(30),
  IN _cuenta int,
  IN _nac varchar(14),
  IN _horario int,
  IN _estadoCivil int,
  IN _contrato int,
  IN _salario int,
  IN _fechaInicio date,
  IN _cargo int,
  IN _dpto int
)
begin
declare _idEmpleado int;
insert into	rrhh.empleado(nombre, apellido, ci, fechaNacimiento, sexo, telefono, direccion, email,
numCuenta, nacionalidad, estado, Horario_idHorario, EstadoCivil_idEstadoCivil, Contrato_idContrato)
values (_nombre, _apellido, _ci, _fechaNac, _sexo, _tel, _dir, _email, _cuenta, _nac, 1, _horario, _estadoCivil, _contrato);

set _idEmpleado = LAST_INSERT_ID();

insert rrhh.empleadocargo(Empleado_idEmpleado, Cargo_idCargo, Departamento_idDepartamento, salarioFijo, fechaAsume)
values (_idEmpleado, _cargo, _dpto, _salario, _fechaInicio);
end //
DELIMITER ;
