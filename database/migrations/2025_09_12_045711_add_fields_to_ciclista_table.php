<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('ciclista', function (Blueprint $table) {
            $table->string('correo', 150)->after('apellidos');
            $table->string('tipo_carrera', 50)->after('referencia_cicla');
            $table->string('nombre_carrera', 100)->after('tipo_carrera');
            $table->string('pais_carrera', 50)->after('nombre_carrera');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ciclista', function (Blueprint $table) {
            //
        });
    }
};
