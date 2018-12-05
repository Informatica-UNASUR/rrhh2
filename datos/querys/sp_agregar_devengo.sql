DELIMITER //
CREATE PROCEDURE sp_agregar_devengo(
	IN _idEmpleado    INT,
	IN _idTipoDevengo INT,
	IN _montoDevengo  DECIMAL,
	IN _fecha         VARCHAR(10),
	IN _obsDevengo    VARCHAR(45)
)
BEGIN
	-- set _fecha = (select convert(varchar(10), @fecha, 103));
	INSERT 	devengo(Empleado_idEmpleado, TipoDevengo_idTipoDevengo, montoDevengo, fechaDevengo, observacion)
	VALUES (_idEmpleado, _idTipoDevengo, _montoDevengo, _fecha, _obsDevengo);
END //
DELIMITER ;
