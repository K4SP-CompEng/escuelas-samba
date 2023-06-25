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
        Schema::create('jam_hist_int', function (Blueprint $table) {
            $table->date('fecha_inicio')->primary();
            $table->string('fecha_fin', 20)->nullable();
            $table->string('autoridad', 2);
            $table->integer('id_colaborador');
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
        Schema::dropIfExists('jam_hist_int');
    }
};
