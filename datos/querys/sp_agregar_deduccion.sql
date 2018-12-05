DELIMITER //
CREATE PROCEDURE sp_agregar_deduccion (
  IN _idEmpleado      INT,
  IN _idTipoDeduccion INT,
  IN _montoDeduccion  DECIMAL,
  IN _fecha           VARCHAR(10),
  IN _obsDeduccion    VARCHAR(45)
)
  BEGIN
    INSERT 	Deduccion(Empleado_idEmpleado, TipoDeduccion_idTipoDeduccion, montoDeduccion, fechaDeduccion, observacion)
    VALUES (_idEmpleado, _idTipoDeduccion, _montoDeduccion, _fecha, _obsDeduccion);
  END //
DELIMITER ;
