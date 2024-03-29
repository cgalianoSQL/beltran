-------------------------------
-- PACKAGE: Beltran         --
-- CLASS: Usuarios          --
-- ABSTRACT DATA TYPE       --
-------------------------------

SELECT 'PACKAGE: BELTRAN CLASS: VERIFICACION (ABSTRACT DATA TYPE)' AS information;

-------------------------------
-- CONSTRUCTORS & DESTRUCTORS
-------------------------------
CREATE OR REPLACE FUNCTION beltran.usuarios (
    IN p_usuario                    text,
	IN p_password                   text,
	IN p_nombre                     text,
	IN p_apellido                   text,
    IN p_nro_documento              text,
    IN p_id_tipo_documento          integer,
    IN p_id_tipo_permiso            integer
) RETURNS beltran.usuarios AS
$$
	INSERT INTO beltran.usuarios (
        usuario, 
        password, 
        nombre, 
        apellido, 
        nro_documento, 
        id_tipo_documento, 
        id_tipo_permiso
    )
	VALUES (
        p_usuario, 
        p_password, 
        p_nombre, 
        p_apellido, 
        p_nro_documento, 
        p_id_tipo_documento, 
        p_id_tipo_permiso
    ) RETURNING *;
$$ LANGUAGE sql VOLATILE 
SET search_path FROM CURRENT;


CREATE OR REPLACE FUNCTION beltran.usuarios_existe_por_usuario (
	IN p_usuario                  text 
) RETURNS boolean AS
$$
	select exists (select * from beltran.usuarios where usuario = p_usuario);
$$ LANGUAGE sql VOLATILE
SET search_path FROM CURRENT;


CREATE OR REPLACE FUNCTION beltran.usuarios_identify_by_id (
	IN p_id                       integer 
) RETURNS beltran.usuarios AS
$$
	select * from beltran.usuarios where id_usuario = p_id limit 1;
$$ LANGUAGE sql VOLATILE
SET search_path FROM CURRENT;

CREATE OR REPLACE FUNCTION beltran.usuarios_identify_by_usuario (
	IN p_usuario                  text 
) RETURNS beltran.usuarios AS
$$
	select * from beltran.usuarios where usuario = p_usuario limit 1;
$$ LANGUAGE sql VOLATILE
SET search_path FROM CURRENT;


CREATE OR REPLACE FUNCTION beltran.usuarios_get_name_complete (
	IN p_usuario                  beltran.usuarios
) RETURNS text AS
$$
	SELECT nombre(p_usuario) || ' ' || apellido(p_usuario);
$$ LANGUAGE sql IMMUTABLE STRICT
SET search_path FROM CURRENT;


CREATE OR REPLACE FUNCTION beltran.usuarios_verificacion (
	IN p_usuario                  text, 
	IN p_password			      text
) RETURNS boolean AS
$$
	select exists (
		SELECT 1 from beltran.usuarios 
            WHERE usuario = p_usuario AND password = p_password AND estado = true 
        limit 1
	);
$$ LANGUAGE sql VOLATILE
SET search_path FROM CURRENT;

CREATE OR REPLACE FUNCTION beltran.usuarios_get_tipo_permiso (
	IN p_usuario                  beltran.usuarios
) RETURNS integer AS
$$
	SELECT id_tipo_permiso(p_usuario);
$$ LANGUAGE sql IMMUTABLE STRICT
SET search_path FROM CURRENT;


CREATE OR REPLACE FUNCTION beltran.usuarios_get_name_by_email (
	IN p_email                    text
) RETURNS text AS
$$
	select u.nombre from beltran.usuarios_contactos as uc inner join beltran.usuarios as u ON u.id_usuario  = uc.id_usuario and uc.descripcion = p_email;
$$ LANGUAGE sql IMMUTABLE STRICT
SET search_path FROM CURRENT;

CREATE OR REPLACE FUNCTION beltran.tipos_permisos_get_nombre_tipo (
	IN p_id                       integer
) RETURNS text AS
$$
	SELECT tipo_permiso FROM beltran.tipos_permisos WHERE id_tipo_permiso = p_id;
$$ LANGUAGE sql IMMUTABLE STRICT
SET search_path FROM CURRENT;


CREATE OR REPLACE FUNCTION beltran.usuarios_set_estado (
	IN p_usuario              text
) RETURNS void AS
$$
	UPDATE beltran.usuarios SET estado = NOT estado WHERE usuario = p_usuario;
$$ LANGUAGE sql VOLATILE STRICT
SET search_path FROM CURRENT;


CREATE OR REPLACE FUNCTION beltran.usuarios_set_recuperacion_password (
	IN p_usuario              text,
	IN p_password             text
) RETURNS void AS
$$
	UPDATE beltran.usuarios SET password = p_password WHERE usuario = p_usuario;
$$ LANGUAGE sql VOLATILE STRICT
SET search_path FROM CURRENT;


