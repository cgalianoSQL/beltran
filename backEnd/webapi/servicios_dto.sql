---------------------------------
-- REQUEST DTO's
---------------------------------
CREATE OR REPLACE FUNCTION webapi.beltran_servicios_request_creation_dto_is_valid (
	IN p_servicios                 jsonb
) RETURNS boolean AS $$
BEGIN 	
    IF NOT p_servicios ?& ARRAY [
        'nombre',
        'descripcion'
    ]
    THEN
        RETURN FALSE;
    END IF;

    RETURN TRUE;
END;
$$ LANGUAGE plpgsql STABLE STRICT
SET search_path FROM CURRENT;