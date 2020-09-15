-------------------------------
-- PACKAGE: Beltran         --
-- CLASS: reclamos          --
-- ABSTRACT DATA TYPE       --
-------------------------------

SELECT 'PACKAGE: BELTRAN CLASS: VERIFICACION (ABSTRACT DATA TYPE)' AS information;

-------------------------------
-- CONSTRUCTORS & DESTRUCTORS
-------------------------------
CREATE OR REPLACE FUNCTION beltran.reclamos (
    IN p_id_servicio              integer,
    IN p_id_usuario_pertenece     integer
) RETURNS beltran.reclamos AS
$$
	INSERT INTO beltran.reclamos (
        creacion, 
        id_servicio, 
        id_usuario_pertenece, 
        id_usuario_asignado, 
        id_estados
    )
	VALUES (
        current_date, 
        p_id_servicio, 
        p_id_usuario_pertenece, 
        7, 
        1
    ) RETURNING *;
$$ LANGUAGE sql VOLATILE STRICT
SET search_path FROM CURRENT;


CREATE OR REPLACE FUNCTION beltran.movimientos_reclamo (
    IN p_comentario               text,
    IN p_realizado                text
) RETURNS beltran.movimientos_reclamo AS
$$
	INSERT INTO beltran.movimientos_reclamo (
        creacion, 
        comentario, 
        realizado
    )
	VALUES (
        current_date, 
        p_comentario, 
        p_realizado
    ) RETURNING *;
$$ LANGUAGE sql VOLATILE STRICT
SET search_path FROM CURRENT;


CREATE OR REPLACE FUNCTION beltran.movimientos_de_reclamos (
    IN id_reclamos                integer,
    IN id_movimientos_reclamo     integer
) RETURNS beltran.movimientos_de_reclamos AS
$$
	INSERT INTO beltran.movimientos_de_reclamos (
        id_reclamos, 
        id_movimientos_reclamo 
    )
	VALUES (
        id_reclamos, 
        id_movimientos_reclamo
    ) RETURNING *;
$$ LANGUAGE sql VOLATILE STRICT
SET search_path FROM CURRENT;



CREATE OR REPLACE FUNCTION beltran.reclamos_search (
) RETURNS beltran.reclamos[] AS $$
DECLARE
	v_reclamos                 beltran.reclamos[];
BEGIN
	EXECUTE FORMAT(
		'SELECT array(SELECT a FROM beltran.reclamos a ORDER BY creacion DESC)'
	) INTO v_reclamos;

	RETURN v_reclamos;
END;
$$ LANGUAGE plpgsql STABLE
SET search_path FROM CURRENT;


CREATE OR REPLACE FUNCTION beltran.reclamos_vw_search (
) RETURNS beltran.reclamos_vw[] AS
 $$
	SELECT array(SELECT a FROM  beltran.reclamos_vw a ORDER BY creacion DESC) 
$$ LANGUAGE sql STABLE
SET search_path FROM CURRENT;



CREATE OR REPLACE FUNCTION beltran.reclamos_vw_filter_by_id_pertenece (
	IN p_reclamos                 beltran.reclamos_vw[],
	IN p_pertenece                integer
) RETURNS beltran.reclamos_vw[] AS
$$
	WITH reclamos AS (
			SELECT * FROM unnest(p_reclamos) x
		)
		SELECT array (
			SELECT s::beltran.reclamos_vw FROM reclamos s
			    WHERE id_usuario_pertenece = p_pertenece
		);
$$ LANGUAGE sql IMMUTABLE STRICT
SET search_path FROM CURRENT;
