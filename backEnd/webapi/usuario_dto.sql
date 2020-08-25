---------------------------------
-- REQUEST DTO's
---------------------------------
CREATE OR REPLACE FUNCTION webapi.beltran_usuarios_request_creation_dto_is_valid (
	IN p_usuarios                 jsonb
) RETURNS boolean AS $$
BEGIN 	
    IF NOT p_usuarios ?& ARRAY [
        'usuario',
        'password',
        'nombre',
        'apellido',
        'nro_cliente',
        'nro_documento',
        'id_tipo_documento',
        'id_tipo_permiso'
    ]
    THEN
        RETURN FALSE;
    END IF;

    RETURN TRUE;
END;
$$ LANGUAGE plpgsql STABLE STRICT
SET search_path FROM CURRENT;
