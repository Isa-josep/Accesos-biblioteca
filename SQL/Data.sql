CREATE DATABASE REGISTRO;
USE REGISTRO;
CREATE TABLE Alumnos(
    NO_CONTROL TEXT,
    Nombre TEXT NOT NULL,
    Apellido_Paterno TEXT NOT NULL,
    Apellido_Materno TEXT NOT NULL,
    GENERO TEXT NOT NULL,
    FECHA_ENTRADA DATETIME NOT NULL 
);

-- TODO: Query para eliminar la tabla Alumnos
--! DELETE FROM Alumnos;