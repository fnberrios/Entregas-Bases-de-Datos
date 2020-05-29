%%sql

CREATE OR REPLACE FUNCTION
artistas_ciudades (lista_artistas varchar[])
RETURNS TABLE (anombre varchar, onombre varchar, cnombre varchar, cpais varchar) AS $$
BEGIN
RETURN QUERY SELECT Artistas.anombre, Obras.onombre, 
    Ciudades.cnombre, Ciudades.cpais FROM Artistas 
    INNER JOIN Creo ON Artistas.aid=Creo.aid INNER JOIN Obras ON Obras.oid=Creo.oid
    INNER JOIN Lugares ON Obras.lid=Lugares.lid INNER JOIN Ciudades ON Ciudades.cid=Lugares.cid
    INNER JOIN unnest(lista_artistas) lista ON Artistas.anombre=lista;
RETURN;
END;
$$ language plpgsql