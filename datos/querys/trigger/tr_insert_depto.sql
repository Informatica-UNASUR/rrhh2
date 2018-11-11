DELIMITER //
CREATE TRIGGER tr_in_departamento
	AFTER INSERT ON departamento
	FOR EACH ROW
		BEGIN
			declare _user varchar(20);
			declare _idD, _idA int;

			set _user = (select USER());
			set _idD = (select idDepartamento from rrhh.departamento order by idDepartamento desc LIMIT 1);

			insert into rrhh.auditoria (usuarioAuditoria, accion, tabla, registroNro)
			VALUES (_user, 'INSERT', 'departamento', _idD);

			set _idA = (select idAuditoria from rrhh.auditoria order by idAuditoria desc LIMIT 1);

			insert into rrhh.detalleauditoria (Auditoria_idAuditoria, nombreColumna, antiguaDescripcion, nuevaDescripcion)
			VALUES (_idA, 'nombreDepartamento', '', NEW.nombreDepartamento);
END //
DELIMITER ;
