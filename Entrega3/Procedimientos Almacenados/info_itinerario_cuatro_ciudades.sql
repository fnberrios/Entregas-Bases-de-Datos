%%sql

CREATE OR REPLACE FUNCTION
info_itinerario_cuatro_ciudades
(lista_artistas varchar[], ciudad_origen varchar)
RETURNS VOID AS $$
DECLARE
    tupla varchar[];
    tupla1 RECORD;
    tupla2 RECORD;
    tupla3 RECORD;
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
FROM itinerario_cuatro_ciudades(lista_artistas, ciudad_origen) LOOP

FOR tupla1 IN
SELECT t1.ciudad_origen, t1.nombreciudad, t1.medio, t1.precio, t1.duracion, t1.hora_salida
FROM
    dblink('dbname=grupo53e3 host=localhost user=grupo53 password=grupo53',
    'SELECT ciudad_origen, nombreciudad, medio, precio, duracion, hora_salida FROM Destinos INNER JOIN Viaje ON Destinos.did=Viaje.did INNER
    JOIN Ciudades ON Ciudades.cid=Viaje.cid') AS 
    t1(ciudad_origen
varchar, nombreciudad varchar, medio varchar, precio integer, duracion integer, hora_salida time) 
    WHERE t1.ciudad_origen=tupla[1] AND t1.nombreciudad=tupla[2] LOOP

    
    FOR tupla2 IN
SELECT t2.ciudad_origen, t2.nombreciudad, t2.medio, t2.precio, t2.duracion, t2.hora_salida
FROM
    dblink('dbname=grupo53e3 host=localhost user=grupo53 password=grupo53',
      'SELECT ciudad_origen, nombreciudad, medio, precio, duracion, hora_salida FROM Destinos INNER JOIN Viaje ON Destinos.did=Viaje.did INNER
      JOIN Ciudades ON Ciudades.cid=Viaje.cid')
      AS t2(ciudad_origen
varchar, nombreciudad varchar, medio varchar, precio integer, duracion integer, hora_salida time) 
      WHERE t2.ciudad_origen=tupla[2] AND t2.nombreciudad=tupla[3] LOOP

      FOR tupla3 IN
SELECT t3.ciudad_origen, t3.nombreciudad, t3.medio, t3.precio, t3.duracion, t3.hora_salida
FROM
    dblink('dbname=grupo53e3 host=localhost user=grupo53 password=grupo53',
        'SELECT ciudad_origen, nombreciudad, medio, precio, duracion, hora_salida FROM Destinos INNER JOIN Viaje ON Destinos.did=Viaje.did INNER
        JOIN Ciudades ON Ciudades.cid=Viaje.cid')
        AS t3(ciudad_origen
varchar, nombreciudad varchar, medio varchar, precio integer, duracion integer, hora_salida time) 
        WHERE t3.ciudad_origen=tupla[3] AND t3.nombreciudad=tupla[4] LOOP



INSERT INTO medios_precios
VALUES
    (id_variable, tupla1.ciudad_origen, tupla1.nombreciudad,
        tupla1.medio, tupla1.precio, tupla1.duracion, tupla1.hora_salida);

INSERT INTO medios_precios
VALUES
    (id_variable, tupla2.ciudad_origen, tupla2.nombreciudad,
        tupla2.medio, tupla2.precio, tupla2.duracion, tupla2.hora_salida);

INSERT INTO medios_precios
VALUES
    (id_variable, tupla3.ciudad_origen, tupla3.nombreciudad,
        tupla3.medio, tupla3.precio, tupla3.duracion, tupla3.hora_salida);

id_variable := id_variable + 1;
END LOOP;
      id_variable := id_variable + 1;
END LOOP;
    id_variable := id_variable + 1;
END LOOP;
END LOOP;

END;
$$ language plpgsql