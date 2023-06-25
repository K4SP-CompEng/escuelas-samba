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
        Schema::table('jam_importe', function (Blueprint $table) {
            $table->foreign(['id_patrocinio'], 'fk_patrocinio')->references(['id_patrocinio'])->on('jam_hist_patrocinio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jam_importe', function (Blueprint $table) {
            $table->dropForeign('fk_patrocinio');
        });
    }
};
