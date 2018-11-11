DELIMITER //
CREATE PROCEDURE sp_registrar_usuario (
  IN _user VARCHAR(20),
  IN _pass VARCHAR(255),
  IN _state BIT,
  IN _rolId INT
)
  BEGIN
    DECLARE _id int;
    INSERT INTO usuario (usuario, password, estado) VALUES (_user, _pass, _state);
    SET _id = LAST_INSERT_ID();

    INSERT INTO usuariorol (Usuario_idUsuario, Rol_idRol)
    VALUES (_id, _rolId);
  END //
DELIMITER ;