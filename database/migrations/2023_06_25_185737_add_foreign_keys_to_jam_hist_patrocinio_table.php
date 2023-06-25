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
        Schema::table('jam_hist_patrocinio', function (Blueprint $table) {
            $table->foreign(['id_donador'], 'fk_donador')->references(['id_donador'])->on('jam_donador');
            $table->foreign(['id_patrocinador'], 'fk_patrocinador')->references(['id_patrocinador'])->on('jam_patrocinador');
            $table->foreign(['id_escuela'], 'fk_escuela')->references(['id_escuela'])->on('jam_escuela');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jam_hist_patrocinio', function (Blueprint $table) {
            $table->dropForeign('fk_donador');
            $table->dropForeign('fk_patrocinador');
            $table->dropForeign('fk_escuela');
        });
    }
};
