
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
        v_usuario_jsonb ->> 'nro_documento',
        (v_usuario_jsonb ->> 'id_tipo_documento')::integer,
        (v_usuario_jsonb ->> 'id_tipo_permiso')::integer
	);

    RETURN v_usuario.id_usuario;
END;
$$ LANGUAGE plpgsql VOLATILE STRICT
SET search_path FROM CURRENT
SECURITY DEFINER;


CREATE OR REPLACE FUNCTION webapi.beltran_usuarios_recuperar_password (
	IN p_usuario                  text,
	IN p_email                    text
) RETURNS text AS $$
DECLARE
	v_usuario_jsonb               jsonb;
	v_usuario	                  beltran.usuarios;
	v_new_password                text;

BEGIN
	IF not exists (select * from beltran.usuarios_vw where usuario = p_usuario AND email = p_email )
	THEN
	    RAISE EXCEPTION 'webapi.beltran_usuarios_recuperar_password EXCEPTION: parameter is not a valid params';
	END IF;

	v_new_password := random_string(16);

    PERFORM beltran.usuarios_set_recuperacion_password(p_usuario, MD5(v_new_password));
    RETURN v_new_password;
END;
$$ LANGUAGE plpgsql VOLATILE STRICT
SET search_path FROM CURRENT
SECURITY DEFINER;


CREATE OR REPLACE FUNCTION webapi.beltran_usuarios_recuperar_usuario (
	IN p_email                    text
) RETURNS text AS $$
DECLARE
	v_usuario_jsonb               jsonb;
	v_usuario	                  beltran.usuarios;
	v_new_password                text;

BEGIN
	IF not exists (select * from beltran.usuarios_vw where email = p_email )
	THEN
	    RAISE EXCEPTION 'webapi.beltran_usuarios_recuperar_usuario EXCEPTION: parameter is not a valid params';
	END IF;
	
    RETURN beltran.usuarios_get_name_by_email(p_email);
END;
$$ LANGUAGE plpgsql VOLATILE STRICT
SET search_path FROM CURRENT
SECURITY DEFINER;


create or replace function random_string(length integer
) returns text as $$ 
declare 
	chars text[] := '{0,1,2,3,4,5,6,7,8,9,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z}';
	result text := '';
	i integer := 0;
begin 
	if length < 0 
	then 
		raise exception 'Given length cannot be less than 0';
	end if;
	for i in 1..length 
	loop 
		result := result || chars[1+random()*(array_length(chars, 1)-1)];
	end loop;
	return result;
	end; 
$$ language plpgsql;


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
        v_usuario_jsonb ->> 'nro_documento',
        (v_usuario_jsonb ->> 'id_tipo_documento')::integer,
        (v_usuario_jsonb ->> 'id_tipo_permiso')::integer
	);

	PERFORM beltran.usuarios_contactos(
		v_usuario.id_usuario,
		1,
		v_usuario_jsonb ->> 'email' 
	);

    COMMIT;
	   
   	p_estado := true;
   
    return;

END;$$


CREATE OR REPLACE PROCEDURE webapi.beltran_usuarios_set_estado_procedimiento(
	p_usuario                     text,
	inout p_estado                boolean
)
LANGUAGE plpgsql    
AS $$
BEGIN
    PERFORM beltran.usuarios_identify_by_usuario(p_usuario);

	PERFORM beltran.usuarios_set_estado (
        p_usuario
	);

    COMMIT;
	   
   	p_estado := true;
   
    return;

END;$$

