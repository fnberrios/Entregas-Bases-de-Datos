%%sql

CREATE OR REPLACE FUNCTION
itinerario_cuatro_ciudades
(lista_artistas varchar[], ciudad_origen varchar)
RETURNS TABLE
(ciudades VARCHAR[], artistas VARCHAR[]) AS $$
DECLARE
    combi_ciudades varchar[];
    posibles_artistas varchar[];
    resultado varchar[];
    tupla RECORD;
BEGIN
    DROP TABLE IF EXISTS itinerario_ciudades;
    CREATE TABLE itinerario_ciudades
    (
        ciudades VARCHAR
        [], artistas VARCHAR[]);

    FOR tupla IN
    SELECT *
    FROM dos_escalas(ciudad_origen) LOOP
    combi_ciudades := ARRAY [tupla.origen, tupla.ciudad1, tupla.ciudad2, tupla.final];
posibles_artistas := ARRAY
    (SELECT DISTINCT Artistas.anombre
    FROM Artistas
        INNER JOIN Creo ON Artistas.aid=Creo.aid INNER JOIN Obras ON Obras.oid=Creo.oid
        INNER JOIN Lugares ON Obras.lid=Lugares.lid INNER JOIN Ciudades ON Ciudades.cid=Lugares.cid
        INNER JOIN unnest(lista_artistas) lista ON 
      Artistas.anombre=lista INNER JOIN unnest(combi_ciudades) lista2 ON Ciudades.cnombre=lista2);
    INSERT INTO itinerario_ciudades
    VALUES
        (combi_ciudades, posibles_artistas);
    END LOOP;
    RETURN QUERY
    SELECT *
    FROM itinerario_ciudades
    WHERE itinerario_ciudades.artistas=lista_artistas;
    RETURN;
    END;
$$ language plpgsql