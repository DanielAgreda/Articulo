<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PDO;

class SeedAnalyticsDatabase extends Command
{
    protected $signature = 'analytics:seed';
    protected $description = 'Crea la base de datos SQLite para analítica con datos simulados de ciclismo.';

    public function handle()
    {
        $dbPath = database_path('analytics/ciclismo_analytics.sqlite');

        // Crear carpeta si no existe
        if (!file_exists(dirname($dbPath))) {
            mkdir(dirname($dbPath), 0777, true);
        }

        // Eliminar si ya existe
        if (file_exists($dbPath)) {
            unlink($dbPath);
        }

        $pdo = new PDO("sqlite:$dbPath");

        $this->info("Base de datos creada: $dbPath");

        // ==========================================
        // 1️⃣ Crear tablas
        // ==========================================
        $schema = <<<SQL
        CREATE TABLE ciclistas (
            id_ciclista INTEGER PRIMARY KEY AUTOINCREMENT,
            nombre TEXT NOT NULL,
            apellidos TEXT NOT NULL,
            pais TEXT,
            edad INTEGER,
            equipo TEXT,
            tipo_ciclista TEXT,
            altura REAL,
            peso REAL,
            anio_debut INTEGER,
            victorias_totales INTEGER
        );

        CREATE TABLE equipos (
            id_equipo INTEGER PRIMARY KEY AUTOINCREMENT,
            nombre TEXT NOT NULL,
            pais TEXT,
            presupuesto_anual REAL,
            anio_fundacion INTEGER,
            patrocinador_principal TEXT
        );

        CREATE TABLE carreras (
            id_carrera INTEGER PRIMARY KEY AUTOINCREMENT,
            nombre TEXT NOT NULL,
            tipo TEXT,
            pais TEXT,
            anio INTEGER,
            duracion_dias INTEGER,
            etapas INTEGER,
            distancia_total REAL
        );

        CREATE TABLE participaciones (
            id_participacion INTEGER PRIMARY KEY AUTOINCREMENT,
            id_ciclista INTEGER,
            id_carrera INTEGER,
            id_equipo INTEGER,
            posicion_final INTEGER,
            tiempo_total REAL,
            promedio_velocidad REAL,
            puntos_obtenidos INTEGER,
            abandono BOOLEAN DEFAULT 0
        );

        CREATE TABLE logros (
            id_logro INTEGER PRIMARY KEY AUTOINCREMENT,
            id_ciclista INTEGER,
            nombre_evento TEXT,
            anio INTEGER,
            posicion INTEGER,
            medalla TEXT
        );

        CREATE TABLE estadisticas (
            id_estadistica INTEGER PRIMARY KEY AUTOINCREMENT,
            id_ciclista INTEGER,
            promedio_velocidad REAL,
            potencia_media REAL,
            distancia_total_anual REAL,
            calorias_quemadas REAL,
            competiciones_disputadas INTEGER,
            victorias_anuales INTEGER
        );
        SQL;

        $pdo->exec($schema);
        $this->info("Tablas creadas correctamente.");

        // ==========================================
        // 2️⃣ Insertar datos simulados masivos
        // ==========================================

        $nombres = ['Egan', 'Tadej', 'Primoz', 'Remco', 'Richard', 'Nairo', 'Jonas', 'Geraint', 'Julian', 'Miguel Ángel'];
        $apellidos = ['Bernal', 'Pogacar', 'Roglic', 'Evenepoel', 'Carapaz', 'Quintana', 'Vingegaard', 'Thomas', 'Alaphilippe', 'Lopez'];
        $paises = ['Colombia', 'Eslovenia', 'Ecuador', 'España', 'Francia', 'Bélgica', 'Reino Unido', 'Alemania', 'Italia', 'EE.UU.'];
        $tipos = ['escalador', 'todoterreno', 'sprinter', 'contrarrelojista', 'gregario'];

        $equipos = [
            ['INEOS Grenadiers', 'Reino Unido', 45000000, 2010, 'INEOS'],
            ['UAE Team Emirates', 'Emiratos Árabes', 48000000, 2017, 'Emirates'],
            ['BORA Hansgrohe', 'Alemania', 28000000, 2010, 'Hansgrohe'],
            ['Soudal Quick-Step', 'Bélgica', 26000000, 2003, 'Soudal'],
            ['EF Education–EasyPost', 'EE.UU.', 18000000, 2007, 'EasyPost']
        ];

        // Insertar equipos
        $stmt = $pdo->prepare("INSERT INTO equipos (nombre, pais, presupuesto_anual, anio_fundacion, patrocinador_principal) VALUES (?, ?, ?, ?, ?)");
        foreach ($equipos as $eq) {
            $stmt->execute($eq);
        }

        // Insertar ciclistas (unos 100 registros)
        $stmt = $pdo->prepare("INSERT INTO ciclistas (nombre, apellidos, pais, edad, equipo, tipo_ciclista, altura, peso, anio_debut, victorias_totales)
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        for ($i = 1; $i <= 100; $i++) {
            $nombre = $nombres[array_rand($nombres)];
            $apellido = $apellidos[array_rand($apellidos)];
            $pais = $paises[array_rand($paises)];
            $equipo = $equipos[array_rand($equipos)][0];
            $tipo = $tipos[array_rand($tipos)];
            $stmt->execute([
                $nombre, $apellido, $pais,
                rand(20, 38), $equipo, $tipo,
                rand(165, 190), rand(58, 80),
                rand(2010, 2022), rand(0, 60)
            ]);
        }

        // Insertar carreras (unos 50 registros)
        $stmt = $pdo->prepare("INSERT INTO carreras (nombre, tipo, pais, anio, duracion_dias, etapas, distancia_total)
                               VALUES (?, ?, ?, ?, ?, ?, ?)");
        $tiposCarrera = ['ruta', 'montaña', 'clásica', 'contrarreloj', 'etapas'];
        for ($i = 1; $i <= 50; $i++) {
            $stmt->execute([
                "Carrera_$i",
                $tiposCarrera[array_rand($tiposCarrera)],
                $paises[array_rand($paises)],
                rand(2018, 2025),
                rand(1, 21),
                rand(1, 21),
                rand(100, 3500)
            ]);
        }

        // Participaciones (alrededor de 500 registros)
        $stmt = $pdo->prepare("INSERT INTO participaciones (id_ciclista, id_carrera, id_equipo, posicion_final, tiempo_total, promedio_velocidad, puntos_obtenidos, abandono)
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        for ($i = 0; $i < 500; $i++) {
            $stmt->execute([
                rand(1, 100),
                rand(1, 50),
                rand(1, 5),
                rand(1, 50),
                rand(70, 120),
                rand(35, 45) + (rand(0, 9) / 10),
                rand(50, 400),
                rand(0, 1)
            ]);
        }

        // Logros
        $stmt = $pdo->prepare("INSERT INTO logros (id_ciclista, nombre_evento, anio, posicion, medalla)
                               VALUES (?, ?, ?, ?, ?)");
        $medallas = ['oro', 'plata', 'bronce', null];
        for ($i = 1; $i <= 200; $i++) {
            $stmt->execute([
                rand(1, 100),
                "Evento_" . rand(1, 30),
                rand(2018, 2025),
                rand(1, 20),
                $medallas[array_rand($medallas)]
            ]);
        }

        // Estadísticas
        $stmt = $pdo->prepare("INSERT INTO estadisticas (id_ciclista, promedio_velocidad, potencia_media, distancia_total_anual, calorias_quemadas, competiciones_disputadas, victorias_anuales)
                               VALUES (?, ?, ?, ?, ?, ?, ?)");
        for ($i = 1; $i <= 100; $i++) {
            $stmt->execute([
                $i,
                rand(35, 45) + (rand(0, 9) / 10),
                rand(320, 420),
                rand(9000, 15000),
                rand(700000, 950000),
                rand(10, 25),
                rand(0, 6)
            ]);
        }

        $this->info("Datos analíticos generados con éxito: ");
        $this->info("   - 100 ciclistas");
        $this->info("   - 5 equipos");
        $this->info("   - 50 carreras");
        $this->info("   - 500 participaciones");
        $this->info("   - 200 logros");
        $this->info("   - 100 estadísticas");
        $this->info("Base de datos lista para análisis");
    }
}
