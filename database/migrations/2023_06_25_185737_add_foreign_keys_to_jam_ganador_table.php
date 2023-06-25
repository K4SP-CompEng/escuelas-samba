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
        Schema::table('jam_ganador', function (Blueprint $table) {
            $table->foreign(['id_premio'], 'fk_id_premio')->references(['id_premio'])->on('jam_premio_especial');
            $table->foreign(['id_escuela'], 'fk_id_escuela')->references(['id_escuela'])->on('jam_escuela');
            $table->foreign(['id_hist'], 'fk_id_hist')->references(['fecha_inicio'])->on('jam_hist_int');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jam_ganador', function (Blueprint $table) {
            $table->dropForeign('fk_id_premio');
            $table->dropForeign('fk_id_escuela');
            $table->dropForeign('fk_id_hist');
        });
    }
};
