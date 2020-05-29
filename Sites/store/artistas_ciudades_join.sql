%%sql

CREATE OR REPLACE FUNCTION
artistas_ciudades_join (lista_artistas varchar[])
RETURNS TABLE (artista1 varchar, artista2 varchar, origen varchar, destino varchar) AS $$
BEGIN
RETURN QUERY SELECT A.anombre AS name1, B.anombre AS name2,
    A.cnombre AS city1, B.cnombre AS city2
    FROM artistas_ciudades(lista_artistas) as A,
    artistas_ciudades(lista_artistas) as B
    WHERE A.anombre!=B.anombre;
RETURN;
END;
$$ language plpgsql