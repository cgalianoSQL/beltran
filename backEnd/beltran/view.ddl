

-------------------------------------------
-- VISTAS
-------------------------------------------
create or replace  VIEW beltran.reclamos_vw AS
	SELECT
		r.id_reclamos,
		r.creacion,
		s.nombre AS servicio,
		up.nombre AS pertenece,
		ua.nombre AS asignado,
		e.nombre_estado,
		r.id_usuario_pertenece
	FROM
		beltran.reclamos r
		INNER JOIN beltran.servicios s ON r.id_servicio = s.id_servicio
		INNER JOIN beltran.usuarios up ON up.id_usuario = r.id_usuario_pertenece
		INNER JOIN beltran.usuarios ua ON ua.id_usuario = r.id_usuario_asignado
		INNER JOIN beltran.estados e ON e.id_estados = r.id_estados
	ORDER BY 
		r.creacion DESC;

