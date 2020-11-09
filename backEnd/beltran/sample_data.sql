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

INSERT INTO beltran.tipos_permisos (tipo_permiso)
	VALUES('SUPERVISOR');

INSERT INTO beltran.tipos_documentos (tipo_documento)
	VALUES('DNI');
	
INSERT INTO beltran.tipos_documentos (tipo_documento)
	VALUES('PASAPORTE');
	
INSERT INTO beltran.tipos_documentos (tipo_documento)
	VALUES('EXTRANJERO');


INSERT INTO beltran.usuarios (
		usuario, password, nombre, apellido,  nro_documento, id_tipo_documento , id_tipo_permiso)
	VALUES('admin', 'admin', 'admin', 'admin',  38754259, 1, 1);

INSERT INTO beltran.usuarios (
		usuario, password, nombre, apellido, , nro_documento, id_tipo_documento , id_tipo_permiso)
	VALUES('soporte', 'soporte', 'soporte', 'soporte',  39754259, 1, 2);

INSERT INTO beltran.usuarios (
		usuario, password, nombre, apellido,  nro_documento, id_tipo_documento , id_tipo_permiso)
	VALUES('cliente', 'cliente', 'cliente', 'cliente',  36754259, 1, 3);

INSERT INTO beltran.usuarios (
		usuario, password, nombre, apellido,  nro_documento, id_tipo_documento , id_tipo_permiso)
	VALUES('jona', 'jona', 'jonathan', 'malito',  35754259, 1, 2);

INSERT INTO beltran.usuarios (
		usuario, password, nombre, apellido, , nro_documento, id_tipo_documento , id_tipo_permiso)
	VALUES('cliente01', 'cliente01', 'Nazareno', 'Martinez',  38751259, 1, 3);

INSERT INTO beltran.usuarios (
		usuario, password, nombre, apellido, nro_documento, id_tipo_documento , id_tipo_permiso)
	VALUES('supervisor', 'supervisor', 'Christian', 'G', 38151259, 1, 4);


INSERT INTO beltran.estados (nombre_estado)
	VALUES('ABIERTO');

INSERT INTO beltran.estados (nombre_estado)
	VALUES('EN CURSO');

INSERT INTO beltran.estados (nombre_estado)
	VALUES('CERRADA');

INSERT INTO beltran.estados (nombre_estado)
	VALUES('REABIERTO');





