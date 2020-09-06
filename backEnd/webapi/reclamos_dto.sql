---------------------------------
-- REQUEST DTO's
---------------------------------
CREATE OR REPLACE FUNCTION webapi.beltran_reclamos_request_creation_dto_is_valid (
	IN p_reclamos                 jsonb
) RETURNS boolean AS $$
BEGIN 	
    IF NOT p_reclamos ?& ARRAY [
        'id_servicio',
        'id_usuario_pertenece',
        'comentario'
    ]
    THEN
        RETURN FALSE;
    END IF;

    RETURN TRUE;
END;
$$ LANGUAGE plpgsql STABLE STRICT
SET search_path FROM CURRENT;
