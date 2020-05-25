CREATE OR REPLACE FUNCTION insertar_persona (rut varchar, nombre varchar, apellido varchar)
RETURNS void AS
$$
BEGIN
    INSERT INTO Personas VALUES (rut, nombre, apellido);
END
$$ language plpgsql
