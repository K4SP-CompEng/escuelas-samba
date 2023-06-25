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
        Schema::create('jam_act_calendarioanual_sem', function (Blueprint $table) {
            $table->integer('id_actividad')->primary();
            $table->string('nombre', 50);
            $table->string('tipo_actividad', 20);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('asistentes')->nullable();
            $table->string('descirpcion', 50)->nullable();
            $table->integer('costo');
            $table->integer('id_escuela');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jam_act_calendarioanual_sem');
    }
};
