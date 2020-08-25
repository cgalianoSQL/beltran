-------------------------------
-- PACKAGE: Beltran         --
-- CLASS: Contactos         --
-- ABSTRACT DATA TYPE       --
-------------------------------

SELECT 'PACKAGE: BELTRAN CLASS: CONTACTOS (ABSTRACT DATA TYPE)' AS information;

-------------------------------
-- CONSTRUCTORS & DESTRUCTORS
-------------------------------
CREATE OR REPLACE FUNCTION beltran.tipos_contactos (
    IN p_descripcion              text
) RETURNS beltran.tipos_contactos AS
$$
	INSERT INTO beltran.tipos_contactos (
        descripcion
    )
	VALUES (
        p_descripcion
    ) RETURNING *;
$$ LANGUAGE sql VOLATILE STRICT
SET search_path FROM CURRENT;

------------------
--TIPOS CONTACTOS
------------------
PERFORM beltran.tipos_contactos('EMAIL');
PERFORM beltran.tipos_contactos('TELEFONO');
PERFORM beltran.tipos_contactos('DIRECCION');


-------------------------------
-- CONSTRUCTORS & DESTRUCTORS
-------------------------------
CREATE OR REPLACE FUNCTION beltran.usuarios_contactos (
    IN p_usuario_id               integer,
    IN p_contacto_id              integer,
    IN p_descripcion              text
) RETURNS beltran.usuarios_contactos AS
$$
	INSERT INTO beltran.usuarios_contactos (
        id_usuario,
        id_tipo_contacto,
        descripcion
    )
	VALUES (
        p_usuario_id,
        p_contacto_id,
        p_descripcion
    ) RETURNING *;
$$ LANGUAGE sql VOLATILE STRICT
SET search_path FROM CURRENT;