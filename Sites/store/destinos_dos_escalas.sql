%%sql

CREATE OR REPLACE FUNCTION
dos_escalas
(ciudad_origen varchar)
RETURNS TABLE
(origen varchar, ciudad1 varchar, ciudad2 varchar, final varchar) AS $$
BEGIN
    RETURN QUERY
    SELECT A.origen AS origen, A.ciudad1 AS ciudad1, A.final AS ciudad2,
        B.destino AS destino
    FROM una_escala() as A,
        destinos_permitidos() as B
    WHERE A.final=B.origen AND A.origen=ciudad_origen;
    RETURN;
END;
$$ language plpgsql