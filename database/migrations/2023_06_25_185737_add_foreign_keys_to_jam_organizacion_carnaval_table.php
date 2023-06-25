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
        Schema::table('jam_organizacion_carnaval', function (Blueprint $table) {
            $table->foreign(['id_rol'], 'fk_id_rol')->references(['id_rol'])->on('jam_rol');
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
        Schema::table('jam_organizacion_carnaval', function (Blueprint $table) {
            $table->dropForeign('fk_id_rol');
            $table->dropForeign('fk_id_hist');
        });
    }
};
