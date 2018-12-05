DELIMITER //
CREATE PROCEDURE sp_registrar_logs (
  IN _user INT,
  IN _ip VARCHAR(50)
)
  BEGIN
    DECLARE _id int;
    DECLARE _ip VARCHAR(50);
    SET _ip = (SELECT host FROM information_schema.processlist WHERE ID = connection_id( ) LIMIT 0 , 30);
    INSERT INTO logs (idusuario, ip) VALUES (_user, _ip);
  END //
DELIMITER ;