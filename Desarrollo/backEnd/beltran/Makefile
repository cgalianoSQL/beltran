.PHONY: clean beltran.sql

all: beltran.sql

beltran.sql:
	touch beltran.sql
	echo >> beltran.sql
	echo >> beltran.sql
	echo >> beltran.sql
	echo "-- PACKAGE: beltran" >> beltran.sql
	cat setup.ddl >> beltran.sql
	cat base.ddl >> beltran.sql


clean:
	$(RM) beltran.sql
