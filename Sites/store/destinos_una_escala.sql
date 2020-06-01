%%sql

CREATE OR REPLACE FUNCTION
una_escala
()
RETURNS TABLE
(origen varchar, ciudad1 varchar, final varchar) AS $$
BEGIN
    RETURN QUERY
    SELECT A.origen AS origen, A.destino AS ciudad1,
        B.destino AS ciudad2
    FROM destinos_permitidos() as A,
        destinos_permitidos() as B
    WHERE A.destino=B.origen;
    RETURN;
END;
$$ language plpgsql