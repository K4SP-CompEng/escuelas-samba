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
        Schema::create('jam_escuela', function (Blueprint $table) {
            $table->integer('id_escuela')->primary();
            $table->string('nombre', 40);
            $table->date('fecha_fundacion');
            $table->string('resumen_hist', 1200);
            $table->string('direccion', 60);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jam_escuela');
    }
};
