-- -----------------------------------------------------
-- BASE DE DATOS rrhh
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS `rrhh` DEFAULT CHARACTER SET utf8 ;
USE rrhh;

-- -----------------------------------------------------
-- Table `EstadoCivil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EstadoCivil` (
  `idEstadoCivil` INT NOT NULL AUTO_INCREMENT,
  `estadoCivil` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idEstadoCivil`)
);
  
-- -----------------------------------------------------
-- Table `Empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Empleado` (
  `idEmpleado` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(30) NOT NULL,
  `apellido` VARCHAR(30) NOT NULL,
  `ci` VARCHAR(15) NOT NULL,
  `fechaNacimiento` DATE NOT NULL,
  `sexo` CHAR(1) NOT NULL,
  `telefono` VARCHAR(15) NULL,
  `direccion` VARCHAR(70) NULL,
  `email` VARCHAR(30) NULL,
  `nombreConyuge` VARCHAR(50) NULL,
  `foto` VARCHAR(100) NULL,
  `estado` BIT NULL,
  `EstadoCivil_idEstadoCivil` INT NOT NULL,
  PRIMARY KEY (`idEmpleado`),
  FOREIGN KEY (`EstadoCivil_idEstadoCivil`) REFERENCES `EstadoCivil` (`idEstadoCivil`)
);
  
 -- -----------------------------------------------------
-- Table `Hijo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Hijo` (
  `idHijo` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(30) NOT NULL,
  `apellido` VARCHAR(30) NOT NULL,
  `fechaNacimiento` DATE NOT NULL,
  `Empleado_idEmpleado` INT NOT NULL,
  PRIMARY KEY (`idHijo`),
  FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `Empleado` (`idEmpleado`)
);

-- -----------------------------------------------------
-- Table `Cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Cargo` (
  `idCargo` INT NOT NULL AUTO_INCREMENT,
  `nombreCargo` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idCargo`)
);

-- -----------------------------------------------------
-- Table `NominaPago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `NominaPago` (
  `idNominaPago` INT NOT NULL AUTO_INCREMENT,
  `Empleado_idEmpleado` INT NOT NULL,
  `diasTrabajados` INT NULL,
  `fechaPago` DATETIME NOT NULL,
  `periodoPago` DATETIME NOT NULL,
  `totalDevengo` DECIMAL NOT NULL,
  `totalDeduccion` DECIMAL NOT NULL,
  `salario` DECIMAL NOT NULL,
  `totalPercibido` DECIMAL NOT NULL,
  PRIMARY KEY (`idNominaPago`),
  FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `Empleado` (`idEmpleado`)
);

-- -----------------------------------------------------
-- Table `Marcacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Marcacion` (
  `idMarcacion` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NOT NULL,
  `horaEntrada` TIME NOT NULL,
  `horaSalida` TIME NOT NULL,
  `horaEntrada2` TIME NULL,
  `horaSalida2` TIME NULL,
  `Empleado_idEmpleado` INT NOT NULL,
  PRIMARY KEY (`idMarcacion`),
  FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `Empleado` (`idEmpleado`)
);

-- -----------------------------------------------------
-- Table `Departamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Departamento` (
  `idDepartamento` INT NOT NULL AUTO_INCREMENT,
  `nombreDepartamento` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idDepartamento`)
);

-- -----------------------------------------------------
-- Table `Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(20) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `fechaAlta` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` BIT NOT NULL,
  PRIMARY KEY (`idUsuario`)
);

-- -----------------------------------------------------
-- Table `Rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rol` (
  `idRol` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(15) NOT NULL,
  `descripcion` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idRol`)
);

-- -----------------------------------------------------
-- Table `Solicitud`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Solicitud` (
  `idSolicitud` INT NOT NULL AUTO_INCREMENT,
  `motivo` VARCHAR(50) NOT NULL,
  `fechaDesde` DATE NOT NULL,
  `fechaHasta` DATE NOT NULL,
  `horaDesde` TIME NULL,
  `horaHasta` TIME NULL,
  `fechaRegistro` DATE NOT NULL,
  `Empleado_idEmpleado` INT NOT NULL,
  PRIMARY KEY (`idSolicitud`),
  FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `Empleado` (`idEmpleado`)
);

-- -----------------------------------------------------
-- Table `Justificacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Justificacion` (
  `idJustificacion` INT NOT NULL AUTO_INCREMENT,
  `fechaPermiso` DATE NOT NULL,
  `motivo` VARCHAR(30) NOT NULL,
  `descripcion` VARCHAR(50),
  `horaInicio` TIME,
  `horaFin` TIME,
  `justificado` BIT NOT NULL,
  `fechaJustificado` DATE NULL,
  `Empleado_idEmpleado` INT NOT NULL,
  PRIMARY KEY (`idJustificacion`),
  FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `Empleado` (`idEmpleado`)
);

-- -----------------------------------------------------
-- Table `TipoDeduccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TipoDeduccion` (
  `idTipoDeduccion` INT NOT NULL AUTO_INCREMENT,
  `tipoDeduccion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoDeduccion`)
);

-- -----------------------------------------------------
-- Table `Deduccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Deduccion` (
  `idDeduccion` INT NOT NULL AUTO_INCREMENT,
  `Empleado_idEmpleado` INT NOT NULL,
  `TipoDeduccion_idTipoDeduccion` INT NOT NULL,
  `montoDeduccion` DECIMAL NOT NULL,
  `fechaDeduccion` DATETIME NULL,
  `observacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idDeduccion`),
  FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `Empleado` (`idEmpleado`),
  FOREIGN KEY (`TipoDeduccion_idTipoDeduccion`) REFERENCES `TipoDeduccion` (`idTipoDeduccion`)
);

-- -----------------------------------------------------
-- Table `TipoDevengo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TipoDevengo` (
  `idTipoDevengo` INT NOT NULL AUTO_INCREMENT,
  `TipoDevengo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoDevengo`)
);


-- -----------------------------------------------------
-- Table `Devengo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Devengo` (
  `idDevengo` INT NOT NULL AUTO_INCREMENT,
  `Empleado_idEmpleado` INT NOT NULL,
  `TipoDevengo_idTipoDevengo` INT NOT NULL,
  `montoDevengo` DECIMAL NOT NULL,
  `fechaDevengo` DATETIME NULL,
  `observacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idDevengo`),
  FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `Empleado` (`idEmpleado`),
  FOREIGN KEY (`TipoDevengo_idTipoDevengo`) REFERENCES `TipoDevengo` (`idTipoDevengo`)
);

-- -----------------------------------------------------
-- Table `UsuarioRol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UsuarioRol` (
  `Usuario_idUsuario` INT NOT NULL AUTO_INCREMENT,
  `Rol_idRol` INT NOT NULL,
   FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `Usuario` (`idUsuario`),
   FOREIGN KEY (`Rol_idRol`) REFERENCES `Rol` (`idRol`)  
);

-- -----------------------------------------------------
-- Table `Auditoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Auditoria` (
  `idAuditoria` INT NOT NULL AUTO_INCREMENT,
  `usuarioAuditoria` VARCHAR(20) NOT NULL,
  `fechaHora` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accion` VARCHAR(6) NOT NULL,
  `tabla` VARCHAR(15) NOT NULL,
  `registroNro` INT NULL,
  PRIMARY KEY (`idAuditoria`)
);

-- -----------------------------------------------------
-- Table `DetalleAuditoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DetalleAuditoria` (
  `idDetalleAuditoria` INT NOT NULL AUTO_INCREMENT,
  `Auditoria_idAuditoria` INT NOT NULL,
  `nombreColumna` VARCHAR(30) NOT NULL,
  `antiguaDescripcion` VARCHAR(100) NULL,
  `nuevaDescripcion` VARCHAR(100) NULL,
  PRIMARY KEY (`idDetalleAuditoria`),
  FOREIGN KEY (`Auditoria_idAuditoria`) REFERENCES `Auditoria` (`idAuditoria`)
); 

-- -----------------------------------------------------
-- Table `EmpleadoCargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmpleadoCargo` (
  `idEmpleadoCargo` INT NOT NULL AUTO_INCREMENT,
  `Empleado_idEmpleado` INT NOT NULL,
  `Cargo_idCargo` INT NOT NULL,
  `Departamento_idDepartamento` INT NOT NULL,
  `salarioFijo` DECIMAL NOT NULL,
  `fechaAsume` DATE NOT NULL,
  PRIMARY KEY (`idEmpleadoCargo`),
  FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `Empleado` (`idEmpleado`),
  FOREIGN KEY (`Cargo_idCargo`) REFERENCES `Cargo` (`idCargo`),
  FOREIGN KEY (`Departamento_idDepartamento`) REFERENCES `Departamento` (`idDepartamento`)
);
  

-- -----------------------------------------------------
-- Table `logs`
-- -----------------------------------------------------

CREATE TABLE `logs` (
  `idlog` INT NOT NULL AUTO_INCREMENT,
  `idusuario` INT(11) NOT NULL,
  `logdate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` VARCHAR(50) NOT NULL,
  PRIMARY KEY (idlog));

