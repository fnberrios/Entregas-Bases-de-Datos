CREATE OR REPLACE FUNCTION
transferencia ()
RETURNS void AS $$
DECLARE
	tupla RECORD;
	concat varchar;
BEGIN
	FOR tupla IN SELECT * FROM Personas LOOP
		concat = tupla.nombre || tupla.apellido;
		insert into PersonasCompleto values (tupla.rut, concat);
	END LOOP;
END
$$ language plpgsql