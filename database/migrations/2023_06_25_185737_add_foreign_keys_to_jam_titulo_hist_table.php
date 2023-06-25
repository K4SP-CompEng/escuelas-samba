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
        Schema::table('jam_titulo_hist', function (Blueprint $table) {
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
        Schema::table('jam_titulo_hist', function (Blueprint $table) {
            $table->dropForeign('fk_escuela');
        });
    }
};
