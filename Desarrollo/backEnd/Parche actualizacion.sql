--Actualizacion de la base para los password en md5
update beltran.usuarios set password = md5(password);