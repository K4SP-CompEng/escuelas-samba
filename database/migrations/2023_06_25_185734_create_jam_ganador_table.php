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
        Schema::create('jam_ganador', function (Blueprint $table) {
            $table->date('fecha')->primary();
            $table->date('id_hist')->nullable();
            $table->integer('id_escuela')->nullable();
            $table->integer('id_premio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jam_ganador');
    }
};
