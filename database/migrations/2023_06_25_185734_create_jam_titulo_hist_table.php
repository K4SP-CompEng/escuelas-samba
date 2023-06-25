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
        Schema::create('jam_titulo_hist', function (Blueprint $table) {
            $table->integer('anio')->primary();
            $table->string('grupo', 50);
            $table->integer('monto')->nullable();
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
        Schema::dropIfExists('jam_titulo_hist');
    }
};
