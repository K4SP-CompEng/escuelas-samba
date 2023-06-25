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
        Schema::table('jam_autor', function (Blueprint $table) {
            $table->foreign(['id_samba'], 'fk_id_samba')->references(['id_samba'])->on('jam_samba');
            $table->foreign(['id_autor'], 'fk_id_autor')->references(['fecha_inicio'])->on('jam_hist_int');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jam_autor', function (Blueprint $table) {
            $table->dropForeign('fk_id_samba');
            $table->dropForeign('fk_id_autor');
        });
    }
};
