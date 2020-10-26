

-------------------------------------------
-- VISTAS
-------------------------------------------
create or replace VIEW beltran.reclamos_vw AS
	SELECT
		r.id_reclamos,
		r.creacion::date as fecha,
		to_char(r.creacion, 'HH24:MI') as hora,
		s.nombre AS servicio,
		up.nombre AS pertenece,
		ua.nombre AS asignado,
		e.nombre_estado,
		r.id_usuario_pertenece,
		r.id_usuario_asignado as id_asignado
	FROM
		beltran.reclamos r
		INNER JOIN beltran.servicios s ON r.id_servicio = s.id_servicio
		INNER JOIN beltran.usuarios up ON up.id_usuario = r.id_usuario_pertenece
		INNER JOIN beltran.usuarios ua ON ua.id_usuario = r.id_usuario_asignado
		INNER JOIN beltran.estados e ON e.id_estados = r.id_estados
	ORDER BY 
		r.creacion DESC;


create or replace  VIEW beltran.usuarios_vw AS
	SELECT
		u.id_usuario,
		u.usuario,
		u.nombre || ' ' || u.apellido AS nombre_completo,
		u.nro_cliente,
		t.tipo_documento || ' ' || u.nro_documento as documento,
		u.id_tipo_permiso,
		CASE WHEN u.estado THEN 'Habilitado'
            ELSE 'deshabilitado'
       	END AS estado
	FROM
		beltran.usuarios u
		INNER JOIN beltran.tipos_documentos t ON t.id_tipo_documento = u.id_tipo_documento
	ORDER BY 
		u.id_usuario ASC;


create or replace  VIEW beltran.reclamos_movimientos_vw AS
	SELECT
		r.creacion::date as fecha,
		to_char(r.creacion, 'HH24:MI') as hora,
		r.comentario as detalle,
		r.realizado,
		m.id_reclamos,
		r.archivo
	FROM
		beltran.movimientos_reclamo r
		INNER JOIN beltran.movimientos_de_reclamos m ON m.id_movimientos_reclamo = r.id_movimientos_reclamo
	ORDER BY 
		r.creacion DESC;

create or replace  VIEW beltran.mis_servicios_vw AS
	select
		s.id_servicio ,
		s.nombre,
		u.id_usuario 
	FROM
		beltran.servicios s
		INNER JOIN beltran.servicios_nro_clientes sc ON sc.id_servicio = s.id_servicio 
		INNER JOIN beltran.usuarios u ON u.nro_cliente = sc.nro_cliente
	ORDER BY 
		s.id_servicio DESC;
