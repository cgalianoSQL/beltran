-------------------------------
-- PACKAGE: Beltran         --
-- CLASS: base              --
-- ABSTRACT DATA TYPE        --
-------------------------------

SELECT 'PACKAGE: BELTRAN CLASS: BASE (ABSTRACT DATA TYPE)' AS information;

CREATE SCHEMA beltran;

CREATE TABLE beltran.tipos_permisos (
	id_tipo_permiso               serial PRIMARY KEY,
	tipo_permiso                  varchar(50)
);

CREATE TABLE beltran.tipos_documentos (
	id_tipo_documento             serial PRIMARY KEY,
	tipo_documento                varchar(50)
);


CREATE TABLE beltran.usuarios (
	id_usuario                    serial PRIMARY KEY,
	usuario                       varchar(50) NOT NULL UNIQUE,
	password                      varchar(50) NOT NULL, 
	nombre                        varchar(50) NOT NULL, 
	apellido                      varchar(50) NOT NULL, 
	nro_cliente                   varchar(50) UNIQUE, 
	nro_documento                 varchar(50) NOT NULL,
	id_tipo_documento             integer REFERENCES beltran.tipos_documentos(id_tipo_documento),
	id_tipo_permiso               integer REFERENCES beltran.tipos_permisos(id_tipo_permiso),
	UNIQUE                        (nro_documento, id_tipo_documento)
);


CREATE TABLE beltran.servicios (
	id_servicio                   serial PRIMARY KEY,
	nombre                        varchar(50) UNIQUE,
	descripcion                   varchar(50),
	habilitado                    boolean NOT NULL DEFAULT true
);

CREATE TABLE beltran.servicios_nro_clientes (
	id_usuario                    integer REFERENCES beltran.usuarios(id_usuario),
	id_servicio                	  integer REFERENCES beltran.servicios(id_servicio),
	PRIMARY KEY 				  (id_usuario, id_servicio)
);


CREATE TABLE beltran.tipos_contactos (
	id_tipo_contacto              serial PRIMARY KEY,
	descripcion                   varchar(50)
);


CREATE TABLE beltran.usuarios_contactos (
	id_usuario                    integer REFERENCES beltran.usuarios(id_usuario),
	id_tipo_contacto           	  integer REFERENCES beltran.tipos_contactos(id_tipo_contacto),
	descripcion                   varchar(50)
);


CREATE TABLE beltran.pais (
	id_pais                       serial PRIMARY KEY,
	nombre_pais                   varchar(75)

);

CREATE TABLE beltran.provincias (
	id_provincia                  serial PRIMARY KEY,
	id_pais                       integer REFERENCES beltran.pais(id_pais),
	nombre_provincia              varchar(75)
);


CREATE TABLE beltran.localidades (
	id_localidad                  serial PRIMARY KEY,
	id_provincia                  integer REFERENCES beltran.provincias(id_provincia),
	nombre_localidad              varchar(75),
	codigo_postal                 varchar(10)
);

CREATE TABLE beltran.direcciones (
	id_direccion                  serial PRIMARY KEY,
	id_localidad                  integer REFERENCES beltran.localidades(id_localidad),
	id_usuario                    integer REFERENCES beltran.usuarios(id_usuario),
	nombre_direccion              varchar(75),
	calle                         varchar(45),
	altura                        varchar(45),
	entre_calle_1                 varchar(45),
	entre_calle_2                 varchar(45)
);
