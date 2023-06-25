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
        Schema::create('jam_premio_especial', function (Blueprint $table) {
            $table->integer('id_premio')->primary();
            $table->string('nombre', 20)->nullable();
            $table->string('tipo', 20)->nullable();
            $table->string('descripcion', 120)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jam_premio_especial');
    }
};
