%%sql

CREATE OR REPLACE FUNCTION
artistas_ciudades_permitidos
(lista_artistas varchar[])
RETURNS TABLE
(artista1 varchar, artista2 varchar, origen varchar, destino varchar) AS $$
BEGIN
    RETURN QUERY
    SELECT A.artista1 AS artista1, A.artista2 AS artista2,
        A.origen AS origen, A.destino AS destino
    FROM artistas_ciudades_join(lista_artistas) as A,
        destinos_permitidos() as B
    WHERE A.origen = B.origen AND A.destino = B.destino;
    RETURN;
END;
$$ language plpgsql
