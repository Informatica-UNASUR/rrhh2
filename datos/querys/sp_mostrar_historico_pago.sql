DELIMITER //
CREATE PROCEDURE sp_mostrar_historico_pago (
  IN _id INT
)
  BEGIN
    select Empleado_idEmpleado, DATE_FORMAT(fechaPago, '%Y-%m-%d') as , periodoPago, Salario,
      totalDeduccion, totalDevengo, totalPercibido from rrhh.nominapago where Empleado_idEmpleado = _id;
  END //
DELIMITER ;