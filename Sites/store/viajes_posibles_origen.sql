%%sql

CREATE OR REPLACE FUNCTION
viajes_posibles_origen
(c_origen varchar)
RETURNS TABLE
(origen varchar, destino varchar) AS $$
BEGIN
    RETURN QUERY
    SELECT DISTINCT t1.ciudad_origen, t1.nombreciudad
    FROM
        dblink('dbname=grupo53e3 host=localhost user=grupo53 password=grupo53',
    'SELECT ciudad_origen, nombreciudad FROM Destinos INNER JOIN Viaje ON Destinos.did=Viaje.did INNER
    JOIN Ciudades ON Ciudades.cid=Viaje.cid') AS t1(ciudad_origen
    varchar, nombreciudad varchar) WHERE c_origen=t1.ciudad_origen;
RETURN;
END;
$$ language plpgsql