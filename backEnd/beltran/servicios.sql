-------------------------------
-- PACKAGE: Beltran         --
-- CLASS: servicios          --
-- ABSTRACT DATA TYPE       --
-------------------------------

SELECT 'PACKAGE: BELTRAN CLASS: SERVICIOS (ABSTRACT DATA TYPE)' AS information;

-------------------------------
-- CONSTRUCTORS & DESTRUCTORS
-------------------------------
CREATE OR REPLACE FUNCTION beltran.servicios (
    IN p_nombre                   text,
    IN p_descripcion              text
) RETURNS beltran.servicios AS
$$
	INSERT INTO beltran.servicios (
        nombre, 
        descripcion
    )
	VALUES (
        UPPER(p_nombre), 
        p_descripcion
    ) RETURNING *;
$$ LANGUAGE sql VOLATILE STRICT
SET search_path FROM CURRENT;


CREATE OR REPLACE FUNCTION beltran.servicios_set_habilitado (
	IN p_id_servicio              integer
) RETURNS void AS
$$
	UPDATE beltran.servicios SET habilitado = NOT habilitado WHERE id_servicio = p_id_servicio;
$$ LANGUAGE sql VOLATILE STRICT
SET search_path FROM CURRENT;


CREATE OR REPLACE FUNCTION beltran.servicios_identify_by_id (
	IN p_id                       integer 
) RETURNS beltran.servicios AS
$$
	select * from beltran.servicios where id_servicio = p_id limit 1;
$$ LANGUAGE sql VOLATILE
SET search_path FROM CURRENT;
