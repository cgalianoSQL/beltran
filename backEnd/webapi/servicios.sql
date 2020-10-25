---------------------------------
-- CONSTRUCTOR & DESTRUCTOR
---------------------------------
CREATE OR REPLACE PROCEDURE webapi.beltran_servicios_creacion_procedimiento(
	p_servicio                    text,
	inout p_estado                boolean
)
LANGUAGE plpgsql    
AS $$
DECLARE
	v_servicio_jsonb              jsonb;
	v_servicio	                  beltran.servicios;
	v_realizado                   text;

BEGIN
	IF NOT webapi.is_text_valid_json(p_servicio)
	THEN
	    RAISE EXCEPTION 'webapi.beltran_servicios_creacion_procedimiento EXCEPTION: parameter is not a valid JSON object';
	END IF;

	v_servicio_jsonb := p_servicio::jsonb;

  	IF NOT webapi.beltran_servicios_request_creation_dto_is_valid(v_servicio_jsonb)
	THEN
	   	RAISE EXCEPTION 'webapi.beltran_servicios_creacion_procedimiento EXCEPTION: malformed JSON object';
	END IF;


	v_servicio := beltran.servicios (
        (v_servicio_jsonb ->> 'nombre')::text,
        (v_servicio_jsonb ->> 'descripcion')::text
	);

    COMMIT;
	   
   	p_estado := true;
   
    return;

END;$$


CREATE OR REPLACE PROCEDURE webapi.beltran_servicios_set_habilitado_procedimiento(
	p_servicio                    integer,
	inout p_estado                boolean
)
LANGUAGE plpgsql    
AS $$
BEGIN
	PERFORM beltran.servicios_identify_by_id(p_servicio);

	PERFORM beltran.servicios_set_habilitado (
        p_servicio
	);

    COMMIT;
	   
   	p_estado := true;
   
    return;

END;$$
