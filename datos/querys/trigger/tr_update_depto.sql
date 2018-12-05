DELIMITER //
CREATE TRIGGER tr_up_departamento
	AFTER UPDATE ON departamento
	FOR EACH ROW
	BEGIN
		declare _user varchar(20);
		declare _idD, _idU, _idA int;

		set _idU = (select idusuario from logs order by idlog desc LIMIT 1);
		set _user = (SELECT usuario FROM Usuario WHERE idusuario = _idU);
		set _idD = (select idDepartamento from Departamento order by idDepartamento desc LIMIT 1);

		insert into Auditoria (usuarioAuditoria, accion, tabla, registroNro)
		VALUES (_user, 'UPDATE', 'departamento', _idD);

		set _idA = (select idAuditoria from Auditoria order by idAuditoria desc LIMIT 1);

		insert into DetalleAuditoria (Auditoria_idAuditoria, nombreColumna, antiguaDescripcion, nuevaDescripcion)
		VALUES (_idA, 'nombreDepartamento', OLD.nombreDepartamento, NEW.nombreDepartamento);
	END //
DELIMITER ;
