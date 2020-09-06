
-- CRACION DE USUARIO POR WEBAPI EJEMPLO
select webapi.beltran_usuarios_creacion(
'{
	"usuario":"Ejemplo",
	"password":"1234",
	"nombre":"ejempl",
	"apellido":"ejempl",
	"nro_cliente":"39999",
	"nro_documento":"36-9666",
	"id_tipo_documento":1,
	"id_tipo_permiso":3
}'
::text);


CALL  webapi.beltran_reclamos_creacion_procedimiento('{
	 "id_servicio":1,
	 "id_usuario_pertenece":9,
	 "comentario":"INICIO DE RECLAMO"}'::text ,
	 false
);
