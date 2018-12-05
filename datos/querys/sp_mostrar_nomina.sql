DELIMITER //
CREATE PROCEDURE sp_mostrar_nomina (
  IN _idEmpleado INT,
  IN _periodo    DATE
)
BEGIN
DECLARE _pDiaMes DATE;
DECLARE _uDiaMes DATE;
DECLARE _salario DECIMAL(10,0);
DECLARE _totalDeduccion DECIMAL(10,0);
DECLARE _totalDevengo DECIMAL(10,0);
DECLARE _totalPercibido DECIMAL(10,0);

SET _pDiaMes = (SELECT ADDDATE(LAST_DAY(SUBDATE(_periodo, INTERVAL 1 MONTH)), 1)  AS primer_dia_mes);
SET _uDiaMes = (SELECT LAST_DAY(_periodo) AS ultimo_dia_mes);

SET _totalDeduccion = (
  SELECT SUM(montoDeduccion) AS TotalDeduccion FROM deduccion
  WHERE fechaDeduccion
  BETWEEN _pDiaMes AND _uDiaMes
  AND Empleado_idEmpleado = _idEmpleado
);
SET _totalDevengo = (
  SELECT SUM(montoDevengo) AS TotalDevengo FROM devengo
  WHERE fechaDevengo BETWEEN _pDiaMes AND _uDiaMes
  AND Empleado_idEmpleado = _idEmpleado
);

SET _salario = (SELECT salariofijo FROM empleadocargo WHERE Empleado_idEmpleado = _idEmpleado LIMIT 1);

IF _totalDeduccion IS NULL THEN SET _totalDeduccion = 0; END IF;
IF _totalDevengo IS NULL THEN SET _totalDevengo = 0; END IF;

SET _totalPercibido = _salario + IFNULL(_totalDevengo, 0) - IFNULL(_totalDeduccion, 0);

SELECT _idEmpleado AS idEmpleado ,_salario AS Salario ,_totalDeduccion AS Deduccion, _totalDevengo AS Devengo, _totalPercibido AS TotalPercibido;
END //
DELIMITER ;