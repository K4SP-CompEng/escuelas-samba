<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jam_colaborador', function (Blueprint $table) {
            $table->integer('id_colaborador')->primary();
            $table->integer('docidentidad');
            $table->string('apodo', 20)->nullable();
            $table->string('primer_nombre', 20);
            $table->string('segundo_nombre', 20)->nullable();
            $table->string('primer_apellido', 20);
            $table->string('segundo_apellido', 20)->nullable();
            $table->date('fecha_nacimiento');
            $table->string('genero', 2);
            $table->string('nacionalidad', 20);
            $table->integer('direccion_colab');
            $table->integer('escuela_colab');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jam_colaborador');
    }
};
