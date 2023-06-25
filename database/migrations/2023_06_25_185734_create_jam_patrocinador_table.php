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
        Schema::create('jam_patrocinador', function (Blueprint $table) {
            $table->integer('id_patrocinador')->primary();
            $table->string('nombre_empresa', 20)->unique('jam_patrocinador_nombre_empresa_key');
            $table->bigInteger('rif_empresa')->unique('jam_patrocinador_rif_empresa_key');
            $table->integer('cod_constitutivo')->unique('jam_patrocinador_cod_constitutivo_key');
            $table->string('email', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jam_patrocinador');
    }
};
