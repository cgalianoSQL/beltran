.PHONY: clean webapi.sql

all: modules webapi.sql

modules:
	make -C beltran

webapi.sql:
	touch webapi.sql
	echo >> webapi.sql
	echo >> webapi.sql
	echo >> webapi.sql
	echo "-- PACKAGE: webapi" >> webapi.sql
	cat setup.ddl >> webapi.sql
	cat helpers.sql >> webapi.sql
	cat beltran/beltran.sql >> webapi.sql


clean:
	$(RM) webapi.sql
	make -C beltran clean
