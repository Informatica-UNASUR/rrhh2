DELIMITER //
CREATE TRIGGER tr_up_salario
  AFTER UPDATE ON empleadocargo
  FOR EACH ROW
  BEGIN
    declare _user varchar(20);
    declare _idD, _idU, _idA int;

    set _idU = (select idusuario from logs order by idlog desc LIMIT 1);
    set _user = (SELECT usuario FROM Usuario WHERE idusuario = _idU);
    set _idD = NEW.idEmpleadoCargo;

    insert into Auditoria (usuarioAuditoria, accion, tabla, registroNro)
    VALUES (_user, 'UPDATE', 'EmpleadoCargo', _idD);

    set _idA = (LAST_INSERT_ID());

    insert into DetalleAuditoria (Auditoria_idAuditoria, nombreColumna, antiguaDescripcion, nuevaDescripcion)
    VALUES (_idA, 'Salario', OLD.salarioFijo, NEW.salarioFijo);
  END //
DELIMITER ;
