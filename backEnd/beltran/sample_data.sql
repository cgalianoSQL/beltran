-------------------------------
-- PACKAGE: Beltran         --
-- CLASS: sample_data        --
-- ABSTRACT DATA TYPE        --
-------------------------------


INSERT INTO beltran.tipos_permisos (tipo_permiso)
	VALUES('ADMINISTRADOR');
	
INSERT INTO beltran.tipos_permisos (tipo_permiso)
	VALUES('SOPORTE');
	
INSERT INTO beltran.tipos_permisos (tipo_permiso)
	VALUES('CLIENTE');

INSERT INTO beltran.tipos_documentos (tipo_documento)
	VALUES('DNI');
	
INSERT INTO beltran.tipos_documentos (tipo_documento)
	VALUES('PASAPORTE');
	
INSERT INTO beltran.tipos_documentos (tipo_documento)
	VALUES('EXTRANJERO');


-- GENERADOR DE NUMERO DE CLIENTES
DO $$
declare
	dato         integer;

BEGIN
    for dato IN 1..100
    LOOP
        INSERT INTO beltran.nro_clientes (nro_cliente)
				VALUES( dato );

    END LOOP;
END$$;

INSERT INTO beltran.servicios (nombre, descripcion)
	VALUES('TELEFONIA', 'PLUS');

INSERT INTO beltran.servicios (nombre, descripcion)
	VALUES('INTERNET', 'PLUS');

INSERT INTO beltran.servicios (nombre, descripcion)
	VALUES('INTERNET PLUS' , 'Telecentro');

INSERT INTO beltran.servicios (nombre, descripcion)
	VALUES('TELEFONIA PLUS' , 'Telecentro');

INSERT INTO beltran.servicios (nombre, descripcion)
	VALUES('TV DIGITAL' , 'Telecentro');

INSERT INTO beltran.servicios (nombre, descripcion)
	VALUES('TELEFONIA MOVIL' , 'Telecentro');

DO $$
declare
	dato         integer;

BEGIN
    for dato IN 1..100
    LOOP
        INSERT INTO beltran.servicios_nro_clientes (nro_cliente, id_servicio)
				VALUES(dato, trunc(random()*3 + 1)::integer );

        INSERT INTO beltran.servicios_nro_clientes (nro_cliente, id_servicio)
				VALUES(dato, trunc(random()*3 + 4)::integer );

    END LOOP;
END$$;


INSERT INTO beltran.usuarios (
		usuario, password, nombre, apellido, nro_cliente, nro_documento, id_tipo_documento , id_tipo_permiso)
	VALUES('admin', 'admin', 'admin', 'admin', NULL, 38754259, 1, 1);

INSERT INTO beltran.usuarios (
		usuario, password, nombre, apellido, nro_cliente, nro_documento, id_tipo_documento , id_tipo_permiso)
	VALUES('soporte', 'soporte', 'soporte', 'soporte', NULL, 39754259, 1, 2);

INSERT INTO beltran.usuarios (
		usuario, password, nombre, apellido, nro_cliente, nro_documento, id_tipo_documento , id_tipo_permiso)
	VALUES('cliente', 'cliente', 'cliente', 'cliente', '23', 36754259, 1, 3);


INSERT INTO beltran.estados (nombre_estado)
	VALUES('ABIERTO');

INSERT INTO beltran.estados (nombre_estado)
	VALUES('EN CURSO');

INSERT INTO beltran.estados (nombre_estado)
	VALUES('CERRADA');





