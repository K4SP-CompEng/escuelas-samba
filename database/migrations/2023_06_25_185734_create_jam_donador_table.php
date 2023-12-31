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
        Schema::create('jam_donador', function (Blueprint $table) {
            $table->integer('id_donador')->primary();
            $table->string('primer_nombre', 20);
            $table->string('segundo_nombre', 20)->nullable();
            $table->string('primer_apellido', 20);
            $table->string('segundo_apellido', 20)->nullable();
            $table->integer('docidentidad')->unique('jam_donador_docidentidad_key');
            $table->string('email', 60);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jam_donador');
    }
};
