DELIMITER //
CREATE PROCEDURE sp_reporte_deduccion (
  IN _idEmpleado INT,
  IN _periodo    DATE
)
  BEGIN
    DECLARE _pDiaMes DATE;
    DECLARE _uDiaMes DATE;

    SET _pDiaMes = (SELECT ADDDATE(LAST_DAY(SUBDATE(_periodo, INTERVAL 1 MONTH)), 1)  AS primer_dia_mes);
    SET _uDiaMes = (SELECT LAST_DAY(_periodo) AS ultimo_dia_mes);

    SELECT idDeduccion, tipoDeduccion, montoDeduccion
    FROM deduccion d
      LEFT JOIN tipodeduccion tp
        ON d.TipoDeduccion_idTipoDeduccion=tp.idTipoDeduccion
    WHERE Empleado_idEmpleado = _idEmpleado
          AND fechaDeduccion BETWEEN _pDiaMes AND _uDiaMes;
  END //
DELIMITER ;
