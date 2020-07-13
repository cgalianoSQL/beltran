-------------------------------
-- PACKAGE: Beltran         --
-- CLASS: verificacion      --
-- ABSTRACT DATA TYPE       --
-------------------------------

SELECT 'PACKAGE: BELTRAN CLASS: VERIFICACION (ABSTRACT DATA TYPE)' AS information;


CREATE OR REPLACE FUNCTION beltran.usuarios_existe_por_usuario (
	IN p_usuario                  text 
) RETURNS boolean AS
$$
	select exists (select * from beltran.usuarios where usuario = p_usuario);
$$ LANGUAGE sql VOLATILE
SET search_path FROM CURRENT;


CREATE OR REPLACE FUNCTION beltran.usuarios_verificacion (
	IN p_usuario                  text, 
	IN p_password			      text
) RETURNS boolean AS
$$
	select exists (
		select * from beltran.usuarios where usuario = p_usuario AND password = p_password
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


REATE OR REPLACE FUNCTION beltran.tipos_permisos_get_nombre_tipo (
	IN p_id                       integer
) RETURNS text AS
$$
	SELECT tipo_permiso FROM beltran.tipos_permisos WHERE id_tipo_permiso = p_id;
$$ LANGUAGE sql IMMUTABLE STRICT
SET search_path FROM CURRENT;


-- METODO USAR PARA PHP
CREATE OR REPLACE FUNCTION webapi.beltran_usuarios_verificacion (
	IN p_usuario                  text, 
	IN p_password			      text
) RETURNS text AS $$
DECLARE 
	v_tipo_permiso_id             integer;
	v_tipo_permiso                text;
	v_usuario                     beltran.usuarios;

BEGIN
	IF NOT beltran.usuarios_verificacion(p_usuario, p_password)
	THEN
		RETURN 'ERROR';
	END IF;

	v_usuario := x from beltran.usuarios x where usuario = p_usuario AND password = p_password limit 1;

	v_tipo_permiso_id := beltran.usuarios_get_tipo_permiso(v_usuario);

	v_tipo_permiso := beltran.tipos_permisos_get_nombre_tipo(v_tipo_permiso_id);

	RETURN v_tipo_permiso;
END
$$ LANGUAGE plpgsql STABLE STRICT
SET search_path FROM CURRENT;


