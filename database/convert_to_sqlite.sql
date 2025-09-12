PRAGMA foreign_keys = OFF;
BEGIN TRANSACTION;

-- Tabla ciclista
CREATE TABLE ciclista (
    id_ciclista   INTEGER PRIMARY KEY AUTOINCREMENT,
    nombres       TEXT,
    apellidos     TEXT,
    email         TEXT,
    equipo        TEXT,
    telefono      INTEGER,
    fecha_nacimiento DATE,
    pais          TEXT,
    referencia    TEXT,
    tipo_carrera  TEXT,
    nombre_carrera TEXT,
    pais_carrera  TEXT,
    imagen        TEXT
);

INSERT INTO ciclista (
    id_ciclista, nombres, apellidos, email, equipo,
    telefono, fecha_nacimiento, pais, referencia,
    tipo_carrera, nombre_carrera, pais_carrera, imagen
) VALUES
(1, 'Egan',   'Bernal', 'egan@gmail.com', 'Movistar', 2147483647, '1982-12-06', 'Colombia', 'a', 'pavimento', 'giro', 'Italia', ''),
(2, 'Jahiro', 'B',      'jahiro@gmail.com', NULL,      2147483647, '2000-08-12', 'Colombia', 'c', 'ciclocross', 'tour', 'Francia', NULL);

-- Tabla ticket
CREATE TABLE ticket (
    id_ticket   INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo      TEXT,
    descripcion TEXT
);

-- Si tienes datos de ticket, insértalos aquí
-- INSERT INTO ticket (id_ticket, titulo, descripcion) VALUES (...);

-- Tabla users
CREATE TABLE users (
    id_user          INTEGER PRIMARY KEY AUTOINCREMENT,
    Cargo            TEXT,
    Equipo           TEXT,
    nombre           TEXT,
    apellidos        TEXT,
    fecha_nacimiento DATE,
    sexo             TEXT,
    telefono         INTEGER,
    email            TEXT,
    pais             TEXT,
    ciudad           TEXT,
    direccion        TEXT,
    contrasenia      TEXT
);

INSERT INTO users (
    id_user, Cargo, Equipo, nombre, apellidos,
    fecha_nacimiento, sexo, telefono, email,
    pais, ciudad, direccion, contrasenia
) VALUES
(1, NULL,        NULL,   NULL,    NULL,    NULL,       NULL,      NULL, 'admin@gmail.com', NULL, NULL, NULL, 'admin123'),
(2, 'administrador','Movistar','Daniel','Agreda','2025-03-04','masculino',2147483647,'usuario@gmail.com','Colombia','Bogota','CLL 64F 73-83','usuario123'),
(4, '',          'Ineos Grenadiers','usuario2','apellido2','2025-11-06','masculino',2147483647,'egan@gmail.com','Ecuador','Pekin','calle45# 73-54','Jahiro'),
(5, 'Usuario',   'MARICONES', 'JAHIRO','MARICA','2005-02-11','femenino',2147483647,'JAHIROESMK@GMAIL.COM','Colombia','Bogota','CARRERA 12 A 40-60 SUR','$2y$10$.IOf9iJWcw0BS9J1d1T13ua4LcHsiq/gaXH/oI8yZX5CwtLwz8t.a');

COMMIT;
PRAGMA foreign_keys = ON;
