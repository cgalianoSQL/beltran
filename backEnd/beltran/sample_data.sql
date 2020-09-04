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

INSERT INTO beltran.usuarios (
		usuario, password, nombre, apellido, nro_cliente, nro_documento, id_tipo_documento , id_tipo_permiso)
	VALUES('admin', 'admin', 'admin', 'admin', NULL, 38754259, 1, 1);

INSERT INTO beltran.usuarios (
		usuario, password, nombre, apellido, nro_cliente, nro_documento, id_tipo_documento , id_tipo_permiso)
	VALUES('soporte', 'soporte', 'soporte', 'soporte', NULL, 39754259, 1, 2);

INSERT INTO beltran.usuarios (
		usuario, password, nombre, apellido, nro_cliente, nro_documento, id_tipo_documento , id_tipo_permiso)
	VALUES('cliente', 'cliente', 'cliente', 'cliente', 'tv123', 36754259, 1, 3);

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

INSERT INTO beltran.servicios_nro_clientes (id_usuario, id_servicio)
	VALUES(3 , 2);

INSERT INTO beltran.servicios_nro_clientes (id_usuario, id_servicio)
	VALUES(3 ,1);

-- GENERADOR DE NUMERO DE CLIENTES
DO $$
declare
	dato         integer;

BEGIN
    for dato IN 1..10
    LOOP
        INSERT INTO beltran.nro_clientes (nro_cliente)
				VALUES( dato || 'bkw' || dato);

    END LOOP;
END$$;






