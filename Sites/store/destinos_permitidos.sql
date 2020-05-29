%%sql

CREATE OR REPLACE FUNCTION
destinos_permitidos ()
RETURNS TABLE (origen varchar, destino varchar) AS $$
BEGIN
RETURN QUERY SELECT DISTINCT t1.ciudad_origen, t1.nombreciudad FROM 
    dblink('dbname=grupo53e3 host=localhost user=grupo53 password=grupo53',
    'SELECT ciudad_origen, nombreciudad FROM Destinos INNER JOIN Viaje ON Destinos.did=Viaje.did INNER
    JOIN Ciudades ON Ciudades.cid=Viaje.cid') AS t1(ciudad_origen varchar, nombreciudad varchar);
RETURN;
END;
$$ language plpgsql