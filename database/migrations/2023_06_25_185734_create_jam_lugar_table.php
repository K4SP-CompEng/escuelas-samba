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
        Schema::create('jam_lugar', function (Blueprint $table) {
            $table->integer('id_lugar')->primary();
            $table->integer('cod_ubicacion')->nullable();
            $table->string('nombre', 20);
            $table->string('tipo', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jam_lugar');
    }
};
