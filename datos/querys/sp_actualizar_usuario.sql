-- Actualiza usuario
DELIMITER //
CREATE PROCEDURE sp_actualizar_usuario(
  IN _id    INT,
  IN _user  VARCHAR(20),
  IN _state BIT,
  IN _rolId INT
)
BEGIN
UPDATE usuario SET usuario = _user, estado = _state WHERE idUsuario = _id;
UPDATE usuariorol SET Rol_idRol = _rolId WHERE Usuario_idUsuario = _id;
END //
DELIMITER ;