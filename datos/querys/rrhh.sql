-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2018 a las 19:18:52
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rrhh`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `idAuditoria` int(11) NOT NULL,
  `usuarioAuditoria` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fechaHora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accion` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `tabla` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `registroNro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ausencia`
--

CREATE TABLE `ausencia` (
  `idAusencia` int(11) NOT NULL,
  `fechaAusencia` date NOT NULL,
  `motivo` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `observacion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `justificado` bit(1) DEFAULT NULL,
  `fechaJustificado` date DEFAULT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idCargo` int(11) NOT NULL,
  `nombreCargo` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `idContrato` int(11) NOT NULL,
  `tipoContrato` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deduccion`
--

CREATE TABLE `deduccion` (
  `idDeduccion` int(11) NOT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL,
  `TipoDeduccion_idTipoDeduccion` int(11) NOT NULL,
  `montoDeduccion` decimal(10,0) NOT NULL,
  `fechaDeduccion` datetime NOT NULL,
  `observacion` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `idDepartamento` int(11) NOT NULL,
  `nombreDepartamento` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleauditoria`
--

CREATE TABLE `detalleauditoria` (
  `idDetalleAuditoria` int(11) NOT NULL,
  `Auditoria_idAuditoria` int(11) NOT NULL,
  `nombreColumna` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `antiguaDescripcion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nuevaDescripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devengo`
--

CREATE TABLE `devengo` (
  `idDevengo` int(11) NOT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL,
  `TipoDevengo_idTipoDevengo` int(11) NOT NULL,
  `montoDevengo` decimal(10,0) NOT NULL,
  `fechaDevengo` datetime NOT NULL,
  `observacion` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ci` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `sexo` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numCuenta` int(11) DEFAULT NULL,
  `nacionalidad` varchar(14) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombreConyuge` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto` tinyblob,
  `estado` tinyint(1) NOT NULL,
  `Horario_idHorario` int(11) NOT NULL,
  `EstadoCivil_idEstadoCivil` int(11) NOT NULL,
  `Contrato_idContrato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleadocargo`
--

CREATE TABLE `empleadocargo` (
  `idEmpleadoCargo` int(11) NOT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL,
  `Cargo_idCargo` int(11) NOT NULL,
  `Departamento_idDepartamento` int(11) NOT NULL,
  `salarioFijo` int(11) DEFAULT NULL,
  `fechaAsume` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadocivil`
--

CREATE TABLE `estadocivil` (
  `idEstadoCivil` int(11) NOT NULL,
  `estadoCivil` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hijo`
--

CREATE TABLE `hijo` (
  `idHijo` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idHorario` int(11) NOT NULL,
  `horaEntrada` time DEFAULT NULL,
  `horaSalida` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcacion`
--

CREATE TABLE `marcacion` (
  `idMarcacion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `horaEntrada` time DEFAULT NULL,
  `horaSalida` time DEFAULT NULL,
  `horaEntrada2` time DEFAULT NULL,
  `horaSalida2` time DEFAULT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nominapago`
--

CREATE TABLE `nominapago` (
  `idNominaPago` int(11) NOT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL,
  `diasTrabajados` int(11) DEFAULT NULL,
  `fechaPago` datetime NOT NULL,
  `periodoPago` datetime NOT NULL,
  `totalDeduccion` decimal(10,0) NOT NULL,
  `totalDevengo` decimal(10,0) NOT NULL,
  `salario` decimal(10,0) NOT NULL,
  `totalPercibido` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idPermiso` int(11) NOT NULL,
  `accion` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `modulo` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisoparcial`
--

CREATE TABLE `permisoparcial` (
  `idPermiso` int(11) NOT NULL,
  `fechaPermiso` date NOT NULL,
  `motivo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `horaInicio` time DEFAULT NULL,
  `horaFin` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `justificado` bit(1) DEFAULT NULL,
  `fechaJustificado` date DEFAULT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retraso`
--

CREATE TABLE `retraso` (
  `idRetraso` int(11) NOT NULL,
  `fechaRetraso` date NOT NULL,
  `minutos` time DEFAULT NULL,
  `observacion` int(11) DEFAULT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolpermiso`
--

CREATE TABLE `rolpermiso` (
  `Rol_idRol` int(11) NOT NULL,
  `Permiso_idPermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `idSolicitud` int(11) NOT NULL,
  `motivo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fechaDesde` date NOT NULL,
  `fechaHasta` date DEFAULT NULL,
  `horaDesde` time DEFAULT NULL,
  `horaHasta` time DEFAULT NULL,
  `fechaRegistro` date NOT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terminacionlaboral`
--

CREATE TABLE `terminacionlaboral` (
  `idterminacionLaboral` int(11) NOT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL,
  `motivo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `justificado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodeduccion`
--

CREATE TABLE `tipodeduccion` (
  `idTipoDeduccion` int(11) NOT NULL,
  `tipoDeduccion` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodevengo`
--

CREATE TABLE `tipodevengo` (
  `idTipoDevengo` int(11) NOT NULL,
  `TipoDevengo` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fechaAlta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariorol`
--

CREATE TABLE `usuariorol` (
  `Usuario_idUsuario` int(11) NOT NULL,
  `Rol_idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`idAuditoria`);

--
-- Indices de la tabla `ausencia`
--
ALTER TABLE `ausencia`
  ADD PRIMARY KEY (`idAusencia`),
  ADD KEY `Empleado_idEmpleado` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`idContrato`);

--
-- Indices de la tabla `deduccion`
--
ALTER TABLE `deduccion`
  ADD PRIMARY KEY (`idDeduccion`),
  ADD KEY `Empleado_idEmpleado` (`Empleado_idEmpleado`),
  ADD KEY `TipoDeduccion_idTipoDeduccion` (`TipoDeduccion_idTipoDeduccion`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`idDepartamento`);

--
-- Indices de la tabla `detalleauditoria`
--
ALTER TABLE `detalleauditoria`
  ADD PRIMARY KEY (`idDetalleAuditoria`),
  ADD KEY `Auditoria_idAuditoria` (`Auditoria_idAuditoria`);

--
-- Indices de la tabla `devengo`
--
ALTER TABLE `devengo`
  ADD PRIMARY KEY (`idDevengo`),
  ADD KEY `Empleado_idEmpleado` (`Empleado_idEmpleado`),
  ADD KEY `TipoDevengo_idTipoDevengo` (`TipoDevengo_idTipoDevengo`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `Horario_idHorario` (`Horario_idHorario`),
  ADD KEY `EstadoCivil_idEstadoCivil` (`EstadoCivil_idEstadoCivil`),
  ADD KEY `Contrato_idContrato` (`Contrato_idContrato`);

--
-- Indices de la tabla `empleadocargo`
--
ALTER TABLE `empleadocargo`
  ADD PRIMARY KEY (`idEmpleadoCargo`),
  ADD KEY `Empleado_idEmpleado` (`Empleado_idEmpleado`),
  ADD KEY `Cargo_idCargo` (`Cargo_idCargo`),
  ADD KEY `Departamento_idDepartamento` (`Departamento_idDepartamento`);

--
-- Indices de la tabla `estadocivil`
--
ALTER TABLE `estadocivil`
  ADD PRIMARY KEY (`idEstadoCivil`);

--
-- Indices de la tabla `hijo`
--
ALTER TABLE `hijo`
  ADD PRIMARY KEY (`idHijo`),
  ADD KEY `Empleado_idEmpleado` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idHorario`);

--
-- Indices de la tabla `marcacion`
--
ALTER TABLE `marcacion`
  ADD PRIMARY KEY (`idMarcacion`),
  ADD KEY `Empleado_idEmpleado` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `nominapago`
--
ALTER TABLE `nominapago`
  ADD PRIMARY KEY (`idNominaPago`),
  ADD KEY `Empleado_idEmpleado` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idPermiso`);

--
-- Indices de la tabla `permisoparcial`
--
ALTER TABLE `permisoparcial`
  ADD PRIMARY KEY (`idPermiso`),
  ADD KEY `Empleado_idEmpleado` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `retraso`
--
ALTER TABLE `retraso`
  ADD PRIMARY KEY (`idRetraso`),
  ADD KEY `Empleado_idEmpleado` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `rolpermiso`
--
ALTER TABLE `rolpermiso`
  ADD KEY `Rol_idRol` (`Rol_idRol`),
  ADD KEY `Permiso_idPermiso` (`Permiso_idPermiso`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`idSolicitud`),
  ADD KEY `Empleado_idEmpleado` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `terminacionlaboral`
--
ALTER TABLE `terminacionlaboral`
  ADD PRIMARY KEY (`idterminacionLaboral`),
  ADD KEY `Empleado_idEmpleado` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `tipodeduccion`
--
ALTER TABLE `tipodeduccion`
  ADD PRIMARY KEY (`idTipoDeduccion`);

--
-- Indices de la tabla `tipodevengo`
--
ALTER TABLE `tipodevengo`
  ADD PRIMARY KEY (`idTipoDevengo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `usuariorol`
--
ALTER TABLE `usuariorol`
  ADD KEY `Usuario_idUsuario` (`Usuario_idUsuario`),
  ADD KEY `Rol_idRol` (`Rol_idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `idAuditoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ausencia`
--
ALTER TABLE `ausencia`
  MODIFY `idAusencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `idContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `deduccion`
--
ALTER TABLE `deduccion`
  MODIFY `idDeduccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `detalleauditoria`
--
ALTER TABLE `detalleauditoria`
  MODIFY `idDetalleAuditoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `devengo`
--
ALTER TABLE `devengo`
  MODIFY `idDevengo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empleadocargo`
--
ALTER TABLE `empleadocargo`
  MODIFY `idEmpleadoCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estadocivil`
--
ALTER TABLE `estadocivil`
  MODIFY `idEstadoCivil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `hijo`
--
ALTER TABLE `hijo`
  MODIFY `idHijo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idHorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `marcacion`
--
ALTER TABLE `marcacion`
  MODIFY `idMarcacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nominapago`
--
ALTER TABLE `nominapago`
  MODIFY `idNominaPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idPermiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisoparcial`
--
ALTER TABLE `permisoparcial`
  MODIFY `idPermiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `retraso`
--
ALTER TABLE `retraso`
  MODIFY `idRetraso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `idSolicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `terminacionlaboral`
--
ALTER TABLE `terminacionlaboral`
  MODIFY `idterminacionLaboral` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipodeduccion`
--
ALTER TABLE `tipodeduccion`
  MODIFY `idTipoDeduccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipodevengo`
--
ALTER TABLE `tipodevengo`
  MODIFY `idTipoDevengo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ausencia`
--
ALTER TABLE `ausencia`
  ADD CONSTRAINT `ausencia_ibfk_1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`);

--
-- Filtros para la tabla `deduccion`
--
ALTER TABLE `deduccion`
  ADD CONSTRAINT `deduccion_ibfk_1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`),
  ADD CONSTRAINT `deduccion_ibfk_2` FOREIGN KEY (`TipoDeduccion_idTipoDeduccion`) REFERENCES `tipodeduccion` (`idTipoDeduccion`);

--
-- Filtros para la tabla `detalleauditoria`
--
ALTER TABLE `detalleauditoria`
  ADD CONSTRAINT `detalleauditoria_ibfk_1` FOREIGN KEY (`Auditoria_idAuditoria`) REFERENCES `auditoria` (`idAuditoria`);

--
-- Filtros para la tabla `devengo`
--
ALTER TABLE `devengo`
  ADD CONSTRAINT `devengo_ibfk_1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`),
  ADD CONSTRAINT `devengo_ibfk_2` FOREIGN KEY (`TipoDevengo_idTipoDevengo`) REFERENCES `tipodevengo` (`idTipoDevengo`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`Horario_idHorario`) REFERENCES `horario` (`idHorario`),
  ADD CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`EstadoCivil_idEstadoCivil`) REFERENCES `estadocivil` (`idEstadoCivil`),
  ADD CONSTRAINT `empleado_ibfk_3` FOREIGN KEY (`Contrato_idContrato`) REFERENCES `contrato` (`idContrato`);

--
-- Filtros para la tabla `empleadocargo`
--
ALTER TABLE `empleadocargo`
  ADD CONSTRAINT `empleadocargo_ibfk_1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`),
  ADD CONSTRAINT `empleadocargo_ibfk_2` FOREIGN KEY (`Cargo_idCargo`) REFERENCES `cargo` (`idCargo`),
  ADD CONSTRAINT `empleadocargo_ibfk_3` FOREIGN KEY (`Departamento_idDepartamento`) REFERENCES `departamento` (`idDepartamento`);

--
-- Filtros para la tabla `hijo`
--
ALTER TABLE `hijo`
  ADD CONSTRAINT `hijo_ibfk_1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`);

--
-- Filtros para la tabla `marcacion`
--
ALTER TABLE `marcacion`
  ADD CONSTRAINT `marcacion_ibfk_1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`);

--
-- Filtros para la tabla `nominapago`
--
ALTER TABLE `nominapago`
  ADD CONSTRAINT `nominapago_ibfk_1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`);

--
-- Filtros para la tabla `permisoparcial`
--
ALTER TABLE `permisoparcial`
  ADD CONSTRAINT `permisoparcial_ibfk_1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`);

--
-- Filtros para la tabla `retraso`
--
ALTER TABLE `retraso`
  ADD CONSTRAINT `retraso_ibfk_1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`);

--
-- Filtros para la tabla `rolpermiso`
--
ALTER TABLE `rolpermiso`
  ADD CONSTRAINT `rolpermiso_ibfk_1` FOREIGN KEY (`Rol_idRol`) REFERENCES `rol` (`idRol`),
  ADD CONSTRAINT `rolpermiso_ibfk_2` FOREIGN KEY (`Permiso_idPermiso`) REFERENCES `permiso` (`idPermiso`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`);

--
-- Filtros para la tabla `terminacionlaboral`
--
ALTER TABLE `terminacionlaboral`
  ADD CONSTRAINT `terminacionlaboral_ibfk_1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`);

--
-- Filtros para la tabla `usuariorol`
--
ALTER TABLE `usuariorol`
  ADD CONSTRAINT `usuariorol_ibfk_1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `usuariorol_ibfk_2` FOREIGN KEY (`Rol_idRol`) REFERENCES `rol` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
