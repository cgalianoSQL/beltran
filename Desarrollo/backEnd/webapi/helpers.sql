
------------------------------
-- PACKAGE: webapi          --
-- HELPERS                  --
------------------------------

SELECT 'PACKAGE: WEBAPI HELPERS METHODS' AS information;

CREATE OR REPLACE FUNCTION webapi.is_text_valid_json (
	p_json                        text
) RETURNS boolean AS $$
BEGIN
	RETURN (p_json::json IS NOT NULL);
EXCEPTION 
	WHEN others THEN
		RETURN FALSE;  
END;
$$ LANGUAGE plpgsql IMMUTABLE STRICT
SET search_path FROM CURRENT;


CREATE OR REPLACE FUNCTION webapi.name2jsonb (
	IN p_name                     text
) RETURNS jsonb AS $$
DECLARE 
	v_name                        jsonb;
	
BEGIN 
	IF NOT webapi.is_text_valid_json(p_name)
	THEN 
		RAISE EXCEPTION 'webapi.name2jsonb EXCEPTION: parameter is not a valid JSON object';
	END IF;
	
	v_name := p_name::jsonb;
	
	IF NOT v_name ? 'name' 
	THEN 
		RAISE EXCEPTION 'webapi.name2jsonb EXCEPTION: malformed JSON object';
	END IF;
	
	RETURN v_name;
END;
$$ LANGUAGE plpgsql IMMUTABLE STRICT
SET search_path FROM CURRENT;


CREATE OR REPLACE FUNCTION webapi.regex_validator (
	IN p_text                     text,
	IN p_regex                    text
) RETURNS boolean AS
$$
	SELECT p_text ~ p_regex;
$$ LANGUAGE sql IMMUTABLE STRICT
SET search_path FROM CURRENT;
