
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