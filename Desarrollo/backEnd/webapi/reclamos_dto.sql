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


CREATE OR REPLACE FUNCTION webapi.beltran_reclamos_request_tomar_dto_is_valid (
	IN p_reclamos                 jsonb
) RETURNS boolean AS $$
BEGIN 	
    IF NOT p_reclamos ?& ARRAY [
        'id_reclamo',
        'id_asignado'
    ]
    THEN
        RETURN FALSE;
    END IF;

    RETURN TRUE;
END;
$$ LANGUAGE plpgsql STABLE STRICT
SET search_path FROM CURRENT;

---------------------------------
-- RESPONSE DTO's
---------------------------------
CREATE OR REPLACE FUNCTION webapi.beltran_reclamos_response_dto (
    IN p_reclamos                  beltran.reclamos
) RETURNS jsonb AS $$
DECLARE
    v_reclamos_dto                 jsonb;

BEGIN
    v_reclamos_dto := jsonb_build_object (
        'id', p_reclamos.id_reclamos,
        'creacion', p_reclamos.creacion
    );

    RETURN v_reclamos_dto;
END;
$$ LANGUAGE plpgsql STABLE STRICT
SET search_path FROM CURRENT;



CREATE OR REPLACE FUNCTION webapi.beltran_reclamos_vw_response_dto (
    IN p_reclamos                  beltran.reclamos_vw
) RETURNS jsonb AS $$
DECLARE
    v_reclamos_dto                 jsonb;

BEGIN
    v_reclamos_dto := jsonb_build_object (
        'id', p_reclamos.id_reclamos,
        'creacion', p_reclamos.creacion,
        'servicio', p_reclamos.servicio,
        'pertenece', p_reclamos.pertenece,
        'asignado', p_reclamos.asignado,
        'nombre_estado', p_reclamos.nombre_estado
    );

    RETURN v_reclamos_dto;
END;
$$ LANGUAGE plpgsql STABLE STRICT
SET search_path FROM CURRENT;


---------------------------------
-- ARRAY MUTATING METHODS
---------------------------------
CREATE OR REPLACE FUNCTION webapi.beltran_reclamos_to_response_dtos (
    IN p_reclamos                  beltran.reclamos_vw[]
) RETURNS jsonb AS $$
DECLARE
    v_reclamo                      beltran.reclamos_vw;
    v_reclamos                     jsonb;
BEGIN
    v_reclamos := '[]';

    FOREACH v_reclamo IN ARRAY p_reclamos
    LOOP
        v_reclamos := v_reclamos || webapi.beltran_reclamos_vw_response_dto(v_reclamo);
    END LOOP;

    RETURN v_reclamos;
END;
$$ LANGUAGE plpgsql STABLE STRICT
SET search_path FROM CURRENT;