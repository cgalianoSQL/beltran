
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


CREATE OR REPLACE FUNCTION webapi.beltran_usuarios_get_id (
	IN p_usuario                  text, 
	IN p_password			      text
) RETURNS integer AS $$
DECLARE 
	v_usuario                     beltran.usuarios;

BEGIN
	IF NOT beltran.usuarios_verificacion(p_usuario, p_password)
	THEN
		RETURN 'ERROR';
	END IF;

	v_usuario := x from beltran.usuarios x where usuario = p_usuario AND password = p_password limit 1;

	RETURN v_usuario.id_usuario;
END
$$ LANGUAGE plpgsql STABLE STRICT
SET search_path FROM CURRENT;


---------------------------------
-- CONSTRUCTOR & DESTRUCTOR
---------------------------------
CREATE OR REPLACE FUNCTION webapi.beltran_usuarios_creacion (
	IN p_usuario                  text
) RETURNS integer AS $$
DECLARE
	v_usuario_jsonb               jsonb;
	v_usuario	                  beltran.usuarios;

BEGIN
	IF NOT webapi.is_text_valid_json(p_usuario)
	THEN
	    RAISE EXCEPTION 'webapi.beltran_usuarios_creacion EXCEPTION: parameter is not a valid JSON object';
	END IF;

	v_usuario_jsonb := p_usuario::jsonb;

  	IF NOT webapi.beltran_usuarios_request_creation_dto_is_valid(v_usuario_jsonb)
	THEN
	   	RAISE EXCEPTION 'webapi.beltran_usuarios_creacion EXCEPTION: malformed JSON object';
	END IF;

    v_usuario := beltran.usuarios (
        v_usuario_jsonb ->> 'usuario',
        v_usuario_jsonb ->> 'password',
        v_usuario_jsonb ->> 'nombre',
        v_usuario_jsonb ->> 'apellido',
        v_usuario_jsonb ->> 'nro_cliente',
        v_usuario_jsonb ->> 'nro_documento',
        (v_usuario_jsonb ->> 'id_tipo_documento')::integer,
        (v_usuario_jsonb ->> 'id_tipo_permiso')::integer
	);

    RETURN v_usuario.id_usuario;
END;
$$ LANGUAGE plpgsql VOLATILE STRICT
SET search_path FROM CURRENT
SECURITY DEFINER;


---------------------------------
-- IDENTIFY AND SEARCH
---------------------------------
CREATE OR REPLACE PROCEDURE webapi.beltran_usuarios_creacion_procedimiento(
	p_usuario                     text,
	inout p_estado                      boolean
)
LANGUAGE plpgsql    
AS $$
DECLARE
	v_usuario_jsonb               jsonb;
	v_usuario	                  beltran.usuarios;

BEGIN
	IF NOT webapi.is_text_valid_json(p_usuario)
	THEN
	    RAISE EXCEPTION 'webapi.beltran_usuarios_creacion_procedimiento EXCEPTION: parameter is not a valid JSON object';
	END IF;

	v_usuario_jsonb := p_usuario::jsonb;

  	IF NOT webapi.beltran_usuarios_request_creation_dto_is_valid(v_usuario_jsonb)
	THEN
	   	RAISE EXCEPTION 'webapi.beltran_usuarios_creacion_procedimiento EXCEPTION: malformed JSON object';
	END IF;

    v_usuario := beltran.usuarios (
        v_usuario_jsonb ->> 'usuario',
        v_usuario_jsonb ->> 'password',
        v_usuario_jsonb ->> 'nombre',
        v_usuario_jsonb ->> 'apellido',
        v_usuario_jsonb ->> 'nro_cliente',
        v_usuario_jsonb ->> 'nro_documento',
        (v_usuario_jsonb ->> 'id_tipo_documento')::integer,
        (v_usuario_jsonb ->> 'id_tipo_permiso')::integer
	);

    COMMIT;
	   
   	p_estado := true;
   
    return;

END;$$
