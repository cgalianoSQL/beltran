---------------------------------
-- CONSTRUCTOR & DESTRUCTOR
---------------------------------
CREATE OR REPLACE PROCEDURE webapi.beltran_reclamos_creacion_procedimiento(
	p_reclamo                     text,
	inout p_estado                boolean
)
LANGUAGE plpgsql    
AS $$
DECLARE
	v_reclamo_jsonb               jsonb;
	v_reclamo	                  beltran.reclamos;
	v_realizado                   text;
	v_movimiento                  beltran.movimientos_reclamo;

BEGIN
	IF NOT webapi.is_text_valid_json(p_reclamo)
	THEN
	    RAISE EXCEPTION 'webapi.beltran_reclamos_creacion_procedimiento EXCEPTION: parameter is not a valid JSON object';
	END IF;

	v_reclamo_jsonb := p_reclamo::jsonb;

  	IF NOT webapi.beltran_reclamos_request_creation_dto_is_valid(v_reclamo_jsonb)
	THEN
	   	RAISE EXCEPTION 'webapi.beltran_reclamos_creacion_procedimiento EXCEPTION: malformed JSON object';
	END IF;


	v_reclamo := beltran.reclamos (
        (v_reclamo_jsonb ->> 'id_servicio')::integer,
        (v_reclamo_jsonb ->> 'id_usuario_pertenece')::integer
	);

	v_realizado := beltran.usuarios_get_name_complete(
		beltran.usuarios_identify_by_id(
			(v_reclamo_jsonb ->> 'id_usuario_pertenece')::integer
		)
	);

    v_movimiento := beltran.movimientos_reclamo (
        v_reclamo_jsonb ->> 'comentario',
		v_reclamo_jsonb ->> 'archivo',
        v_realizado
	);

	PERFORM beltran.movimientos_de_reclamos (
        v_reclamo.id_reclamos,
        v_movimiento.id_movimientos_reclamo
	);

    COMMIT;
	   
   	p_estado := true;
   
    return;

END;$$


CREATE OR REPLACE PROCEDURE webapi.beltran_reclamos_tomar_procedimiento(
	p_reclamo                     text,
	inout p_estado                boolean
)
LANGUAGE plpgsql    
AS $$
DECLARE
	v_reclamo_jsonb               jsonb;
	v_reclamo	                  beltran.reclamos;
	v_realizado                   text;
	v_movimiento                  beltran.movimientos_reclamo;

BEGIN
	IF NOT webapi.is_text_valid_json(p_reclamo)
	THEN
	    RAISE EXCEPTION 'webapi.beltran_reclamos_creacion_procedimiento EXCEPTION: parameter is not a valid JSON object';
	END IF;

	v_reclamo_jsonb := p_reclamo::jsonb;

  	IF NOT webapi.beltran_reclamos_request_tomar_dto_is_valid(v_reclamo_jsonb)
	THEN
	   	RAISE EXCEPTION 'webapi.beltran_reclamos_creacion_procedimiento EXCEPTION: malformed JSON object';
	END IF;

	v_realizado := beltran.usuarios_get_name_complete(
		beltran.usuarios_identify_by_id(
			(v_reclamo_jsonb ->> 'id_asignado')::integer
		)
	);

    v_movimiento := beltran.movimientos_reclamo (
        'Reclamo tomado por personal de soporte',
        v_realizado
	);

	PERFORM beltran.movimientos_de_reclamos (
        (v_reclamo_jsonb ->> 'id_reclamo')::integer,
        v_movimiento.id_movimientos_reclamo
	);

	PERFORM beltran.reclamos_set_asignado(
		(v_reclamo_jsonb ->> 'id_reclamo')::integer,
		(v_reclamo_jsonb ->> 'id_asignado')::integer
	);

	PERFORM beltran.reclamos_set_estado (
		(v_reclamo_jsonb ->> 'id_reclamo')::integer,
		2
	);

    COMMIT;
	   
   	p_estado := true;
   
    return;

END;$$


--SEARCH
CREATE OR REPLACE FUNCTION webapi.beltran_reclamos_vw_search (
    IN p_id_pertenece             integer
) RETURNS text AS $$
DECLARE
    v_reclamos                    beltran.reclamos_vw[];
	v_info                        jsonb;
	v_data                        jsonb;
	v_response                    jsonb;

BEGIN
	v_reclamos := beltran.reclamos_vw_search();

	v_reclamos := beltran.reclamos_vw_filter_by_id_pertenece(v_reclamos,p_id_pertenece);
    
	v_response := jsonb_build_object (
		'reclamos',webapi.beltran_reclamos_to_response_dtos(v_reclamos)
	);

    RETURN v_response::text;
END;
$$ LANGUAGE plpgsql STABLE
SET search_path FROM CURRENT
SECURITY DEFINER;
