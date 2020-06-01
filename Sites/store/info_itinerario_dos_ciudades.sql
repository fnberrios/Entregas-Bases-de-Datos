%%sql

CREATE OR REPLACE FUNCTION
info_itinerario_dos_ciudades
(lista_artistas varchar[], ciudad_origen varchar)
RETURNS VOID AS $$
DECLARE
    tupla varchar[];
    tupla1 RECORD;
    id_variable integer;
BEGIN
    DROP TABLE IF EXISTS medios_precios;
    DROP TABLE IF EXISTS info_itinerarios;
    CREATE TABLE medios_precios
    (
        id_itinerario integer,
        ciudad1 VARCHAR,
        ciudad2 VARCHAR,
        medio VARCHAR,
        precio integer,
        duracion integer,
        hora_salida time
    );
    CREATE TABLE info_itinerarios
    (
        id_itinerario integer,
        precio_total integer
    );
    id_variable := 1;

FOR tupla IN
SELECT DISTINCT ciudades
FROM itinerario_dos_ciudades(lista_artistas, ciudad_origen) LOOP

FOR tupla1 IN
SELECT t1.ciudad_origen, t1.nombreciudad, t1.medio, t1.precio, t1.duracion, t1.hora_salida
FROM
    dblink('dbname=grupo53e3 host=localhost user=grupo53 password=grupo53',
    'SELECT ciudad_origen, nombreciudad, medio, precio, duracion, hora_salida FROM Destinos INNER JOIN Viaje ON Destinos.did=Viaje.did INNER
    JOIN Ciudades ON Ciudades.cid=Viaje.cid') AS 
    t1(ciudad_origen
varchar, nombreciudad varchar, medio varchar, precio integer, duracion integer, hora_salida time) 
    WHERE t1.ciudad_origen=tupla[1] AND t1.nombreciudad=tupla[2] LOOP

INSERT INTO medios_precios
VALUES
    (id_variable, tupla1.ciudad_origen, tupla1.nombreciudad,
        tupla1.medio, tupla1.precio, tupla1.duracion, tupla1.hora_salida);

id_variable := id_variable + 1;
END LOOP;
END LOOP;

END;
$$ language plpgsql