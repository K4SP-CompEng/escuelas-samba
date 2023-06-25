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
        Schema::table('jam_colaborador', function (Blueprint $table) {
            $table->foreign(['escuela_colab'], 'fk_escuela_colab')->references(['id_escuela'])->on('jam_escuela');
            $table->foreign(['direccion_colab'], 'fk_direccion_colab')->references(['id_lugar'])->on('jam_lugar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jam_colaborador', function (Blueprint $table) {
            $table->dropForeign('fk_escuela_colab');
            $table->dropForeign('fk_direccion_colab');
        });
    }
};
