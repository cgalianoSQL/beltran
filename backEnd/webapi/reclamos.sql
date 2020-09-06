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
