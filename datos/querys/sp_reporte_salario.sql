DELIMITER //
CREATE PROCEDURE sp_reporte_salario(
  IN _idEmpleado INT,
  IN _periodo    DATE
)
BEGIN
DECLARE _pDiaMes DATE;
DECLARE _uDiaMes DATE;

  SET _pDiaMes = (SELECT ADDDATE(LAST_DAY(SUBDATE(_periodo, INTERVAL 1 MONTH)), 1)  AS primer_dia_mes);
  SET _uDiaMes = (SELECT LAST_DAY(_periodo) AS ultimo_dia_mes);

SELECT idEmpleado, CONCAT(nombre,' ',apellido) AS empleado, periodoPago , salario
FROM nominapago n
INNER JOIN empleado e
ON n.Empleado_idEmpleado=e.idEmpleado
WHERE Empleado_idEmpleado = _idEmpleado
AND periodoPago BETWEEN _pDiaMes AND _uDiaMes;
END //
DELIMITER ;


