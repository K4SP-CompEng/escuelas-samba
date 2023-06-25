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
        Schema::create('jam_telefono', function (Blueprint $table) {
            $table->integer('cod_area');
            $table->integer('numero');
            $table->string('tipo', 5);
            $table->integer('id_donador')->nullable();
            $table->integer('id_patrocinador')->nullable();
            $table->integer('id_escuela')->nullable();

            $table->primary(['cod_area', 'numero']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jam_telefono');
    }
};
