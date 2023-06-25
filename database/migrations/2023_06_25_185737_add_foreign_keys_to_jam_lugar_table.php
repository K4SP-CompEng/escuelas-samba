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
        Schema::table('jam_lugar', function (Blueprint $table) {
            $table->foreign(['cod_ubicacion'], 'fk_ubicacion')->references(['id_lugar'])->on('jam_lugar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jam_lugar', function (Blueprint $table) {
            $table->dropForeign('fk_ubicacion');
        });
    }
};
