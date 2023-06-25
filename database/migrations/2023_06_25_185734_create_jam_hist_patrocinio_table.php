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
        Schema::create('jam_hist_patrocinio', function (Blueprint $table) {
            $table->integer('id_patrocinio')->primary();
            $table->date('fecha_inico');
            $table->date('fecha_fin')->nullable();
            $table->integer('id_donador')->nullable();
            $table->integer('id_patrocinador')->nullable();
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
        Schema::dropIfExists('jam_hist_patrocinio');
    }
};
